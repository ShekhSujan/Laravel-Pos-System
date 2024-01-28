<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Enums\TrashActionEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class PaymentMethodController extends Controller
{

    public function index()
    {
        $data['title'] = "All PaymentMethod";
        $data['allPaymentMethod'] = PaymentMethod::latest()->get();
        return view("pages.payment-method.index")->with($data);
    }
    public function create()
    {
        $data['title'] = "New PaymentMethod";
        return view("pages.payment-method.create")->with($data);
    }

    public function store(Request $request)
    {
        try {
            $arr = [
                "title" => $request->input("title"),
                "status" => StatusEnum::Active,
            ];
            PaymentMethod::create($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update PaymentMethod";
        $data['selected'] = PaymentMethod::find($id);
        return view("pages.payment-method.edit")->with($data);
    }

    public function update(Request $request)
    {
        try {
            $id = $request->input("id");
            $arr = [
                "title" => $request->input("title"),
                "status" => $request->input("status"),
            ];
            PaymentMethod::where('id', $id)->update($arr);
            Toastr::success('Update Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function trash_list()
    {
        $data['title'] = 'Trash List';
        $data['allPaymentMethod'] = PaymentMethod::onlyTrashed()->latest()->get();
        return view('pages.payment-method.trash-list')->with($data);
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (PaymentMethod::where("id", $id)->delete()) {
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
            PaymentMethod::whereIn("id", $id)->forceDelete();
            Toastr::success('Deleted Successfully', 'Success');
        } elseif ($type == TrashActionEnum::Restore->value && $id) {
            PaymentMethod::whereIn("id", $id)->restore();
            Toastr::success('Restored Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
}
