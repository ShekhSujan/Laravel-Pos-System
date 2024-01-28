<?php

namespace App\Http\Controllers;

use Exception;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use App\Enums\TrashActionEnum;
use App\Http\Requests\SupplierRequest;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Brian2694\Toastr\Facades\Toastr;

class SupplierController extends Controller
{

    public function index()
    {
        $data['title'] = "All Supplier";
        $data['allSupplier'] = Supplier::latest()->get();

        return view("pages.supplier.index")->with($data);
    }
    public function create()
    {
        $data['title'] = "New Supplier";
        return view("pages.supplier.create")->with($data);
    }

    public function store(SupplierRequest $request)
    {
        try {
            $arr = [
                "title" => $request->input("title"),
                "email" => $request->input("email"),
                "city" => $request->input("city"),
                "zipcode" => $request->input("zipcode"),
                "address" => $request->input("address"),
                "mobile" => $request->input("mobile"),
                "status" => StatusEnum::Active,
            ];
            Supplier::create($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update Supplier";
        $data['selected'] = Supplier::findOrFail($id);
        return view("pages.supplier.edit")->with($data);
    }

    public function update(SupplierRequest $request)
    {
        try {
            $id = $request->input("id");
            $arr = [
                "title" => $request->input("title"),
                "email" => $request->input("email"),
                "city" => $request->input("city"),
                "zipcode" => $request->input("zipcode"),
                "address" => $request->input("address"),
                "mobile" => $request->input("mobile"),
                "status" => $request->input("status"),
            ];
            Supplier::where('id', $id)->update($arr);
            Toastr::success('Update Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function trash_list()
    {
        $data['title'] = 'Trash List';
        $data['allSupplier'] = Supplier::onlyTrashed()->latest()->get();
        return view('pages.supplier.trash-list')->with($data);
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (Supplier::where("id", $id)->delete()) {
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
            $data = Supplier::onlyTrashed()->whereIn("id", $id)->forceDelete();
            Toastr::success('Deleted Successfully', 'Success');
        } elseif ($type == TrashActionEnum::Restore->value && $id) {
            Supplier::whereIn("id", $id)->restore();
            Toastr::success('Restored Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
}
