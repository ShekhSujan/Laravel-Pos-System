<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Supplier;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use App\Enums\TrashActionEnum;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class StockController extends Controller
{

    public function index()
    {
        $data['title'] = "Stock Products";
        $data['allProduct'] = Product::with(['stock'])->where('status', StatusEnum::Active)->latest('id')->get();
        $data['allSupplier'] = Supplier::oldest('id')->where('status', StatusEnum::Active)->get();

        return view("pages.stock.index")->with($data);
    }
    public function all()
    {
        $data['title'] = "Stock Products";
        $data['allStock'] = Stock::with(['supplier', 'product'])
            ->latest('id')
            ->get();
        $data['allSupplier'] = Supplier::oldest('id')->where('status', StatusEnum::Active)->get();
        return view("pages.stock.all")->with($data);
    }
    public function store(Request $request)
    {
        try {
            $arr = [
                "product_id" => $request->input("product_id"),
                "supplier_id" => $request->input("supplier_id"),
                "in_date" => $request->input("in_date"),
                "in_qty" => $request->input("in_qty"),
                "type" => 1,
            ];

            Stock::create($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update Stock";
        $data['selected'] = Stock::find($id);
        $data['allSupplier'] = Supplier::oldest('id')->where('status', StatusEnum::Active)->get();
        return view("pages.stock.edit")->with($data);
    }

    public function update(Request $request)
    {
        try {
            $id = $request->input("id");
            $arr = [
                "supplier_id" => $request->input("supplier_id"),
                "in_date" => $request->input("in_date"),
                "in_qty" => $request->input("in_qty"),
            ];

            Stock::where('id', $id)->update($arr);
            Toastr::success('Update Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }


    public function supplier($id)
    {
        $data['title'] = "Stock By Supplier";
        $data['allStock'] = Supplier::with(['stock'])->findOrFail($id);

        return view("pages.stock.supplier")->with($data);
    }

    public function product($id)
    {
        $data['title'] = "Stock By Products";
        $data['allProductStock'] = Product::with(['stock'])->where('id', $id)->first();
        $data['allSupplier'] = Supplier::where('status', StatusEnum::Active)->get();
        return view("pages.stock.single-product")->with($data);
    }
    public function filter(Request $request)
    {
        $data['title'] = "Stock By Products";
        $data['allProduct'] = Product::where('status', StatusEnum::Active)
            ->latest('id')
            ->get();
        $data['allSupplier'] = Supplier::where('status', StatusEnum::Active)->get();
        if ($request->input()) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            $sql = Stock::query();
            if ($request->get("product_id")) {
                $sql = $sql->where("product_id", $request->get("product_id"));
            }
            if ($request->get("supplier_id")) {
                $sql = $sql->where("supplier_id", $request->get("supplier_id"));
            }
            if ($start_date || $end_date) {
                $sql = $sql->where(function ($query) use ($start_date, $end_date) {
                    $query->whereBetween('in_date', [$start_date, $end_date])
                        ->orWhereBetween('out_date', [$start_date, $end_date]);
                });
            }

            $data['allStock'] = $sql->get();
        }
        return view("pages.stock.filter")->with($data);
    }
    public function bulk_action(Request $request)
    {
        $type = $request->input("type");
        $id = $request->input("chk");

        if ($type == TrashActionEnum::PermanentDelete->value && $id) {
            Stock::whereIn("id", $id)->forceDelete();
            Toastr::success('Deleted Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
}
