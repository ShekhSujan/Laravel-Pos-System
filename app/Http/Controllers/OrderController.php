<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Enums\TrashActionEnum;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Models\CashRegister;
use App\Models\InvoiceSetting;
use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
{

    public function pending()
    {
        $data['title'] = 'Pending Order';
        $data['allPending'] = Order::where('status', StatusEnum::Draft)
            ->latest('id')
            ->get();
        return view('pages.order.pending')->with($data);
    }

    public function pos_sales()
    {
        $data['title'] = 'Pos Order';
        $data['allPosOrder'] = Order::where('status', StatusEnum::Active)->get();
        return view('pages.order.pos-order')->with($data);
    }
    public function today()
    {
        $data['title'] = 'Todays Report';
        $data['allToday'] = Order::today()->where('status', 'active')->latest('id')->get();
        $data['totalAmount'] = $data['allToday']->sum('total');
        return view('pages.order.today')->with($data);
    }
    public function month()
    {
        $data['title'] = 'Monthly Report';
        $data['allMonth'] = Order::currentMonth()->where('status', 'active')->latest('id')->get();
        $data['totalAmount'] = $data['allMonth']->sum('total');
        return view('pages.order.month')->with($data);
    }
    public function filter(Request $request)
    {
        $data['title'] = 'Order Filter';
        if ($request->input()) {

            $start = $request->input('start_date');
            $end = $request->input('end_date');

            $order = Order::where('status', 'active')->latest('id');

            if ($request->input("start_date")) {
                $order = $order->where('date', '>=', $start);
            }
            if ($request->input("end_date")) {
                $order = $order->where('date', '<=', $end);
            }

            $data['allOrder'] = $order->get();
            $data['totalAmount'] = $data['allOrder']->sum('total');
        }
        return view('pages.order.filter')->with($data);
    }
    public function create(Request $request)
    {
        $data['title'] = 'New Order';
        $data['allPaymentMethod'] = PaymentMethod::where('status', StatusEnum::Active)
            ->latest()
            ->get();
        $data['allProduct'] = Product::with(['category', 'brand'])->where('status', StatusEnum::Active)
            ->latest('id')
            ->get();
        $data['allOfferProduct'] = Product::with(['category', 'brand'])->offer()
            ->latest('id')
            ->get();
        $data['invoiceSetting'] = InvoiceSetting::firstOrfail();
        $data['allOrder'] = Order::latest('id')->take(10)->get();

        $data['cashRegister'] = CashRegister::latest()->first();

        return view('pages.order.create')->with($data);
    }
    public function store(Request $request)
    {

        //order
        $order = new Order();
        $order->orderid = Str::random(10);
        $order->total = $request->total;
        $order->tax = $request->tax;
        $order->discount = $request->discount;
        $order->subtotal = $request->subtotal;
        $order->method_id = $request->method_id;
        $order->date = date('Y-m-d');
        $order->status = $request->status;
        $order->save();

        //Order Details
        $products = $request->id;
        $qty = $request->qty;
        $unit_price = $request->unit_price;
        $total_price = $request->total_price;

        $cartItems = [];
        foreach ($products as $key => $cartData) {
            $cartItems[] = [
                'order_id' => $order->id,
                'product_id' => $cartData,
                'qty' => $qty[$key],
                'price' => $unit_price[$key],
                'total' => $total_price[$key],
            ];
        }
        $order->orderdetails()->createMany($cartItems);

        //Stock
        foreach ($products as $key => $cartData) {
            $cartItems = [
                'order_id' => $order->id,
                'product_id' => $cartData,
                'out_qty' => $qty[$key],
                "type" => 2,
                'out_date' => date('Y-m-d'),
            ];
            Stock::create($cartItems);
        }
        Toastr::success('Order Completed Successfully', 'Success');

        return redirect()->back()->with(['msg' => 1]);
    }
    public function order_update(Request $request)
    {

        $id = $request->input('id');
        $status = $request->input('status');
        $stock = $request->input('stock');
        $order = Order::findOrfail($id);
        if ($order) {
            $order->update(['status' => $status, 'stock' => $stock]);
            if ($stock == 1) {
                $order->orderStock()->delete();
            }
            Toastr::success('Updated Successfully', 'Success');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }
        return redirect()->back();
    }

    public function trash_list()
    {
        $data['title'] = 'Trash List';
        $data['allOrder'] = Order::onlyTrashed()->latest()->get();
        return view('pages.order.trash-list')->with($data);
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (Order::where("id", $id)->delete()) {
            Toastr::error('Moved To Trash Successfully', 'Warning');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }
        return redirect()->back();
    }
    public function bulk_action(Request $request)
    {
        $type = $request->input("type");
        $id = $request->input("chk");

        if ($type == TrashActionEnum::PermanentDelete->value && $id) {
            $data = Order::whereIn("id", $id)->get();
            foreach ($data as $value) {
                $order = Order::find($value->id);
                if ($order) {
                    $order->orderDetails()->forceDelete();
                    $order->forceDelete();
                }
            }
            Toastr::success('Deleted Successfully', 'Success');
        } elseif ($type == TrashActionEnum::Restore->value && $id) {
            Order::whereIn("id", $id)->restore();
            Toastr::success('Restored Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
}
