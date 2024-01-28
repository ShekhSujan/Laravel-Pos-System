<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\CashRegister;
use Illuminate\Http\Request;
use App\Enums\TrashActionEnum;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Constants\CashRegisterStatus;
use App\Http\Requests\CashRegisterOpenRequest;
use App\Http\Requests\CashRegisterCloseRequest;

class CashRegisterController extends Controller
{

    public function index()
    {
        $data['title'] = "All CashRegister";
        $data['allCashRegister'] = CashRegister::latest()->get();

        return view("pages.cash.index")->with($data);
    }

    public function store(CashRegisterOpenRequest $request)
    {
        try {
            $arr = [
                "title" => $request->input("title"),
                "opening" => $request->input("opening"),
                "opening_time" => $request->input("opening_time"),
                "status" => CashRegisterStatus::OPEN,
            ];
            CashRegister::create($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update CashRegister";
        $data['selected'] = CashRegister::findOrFail($id);
        return view("pages.cash.edit")->with($data);
    }

    public function update(CashRegisterCloseRequest $request)
    {
        try {
            $id = $request->input("id");
            $arr = [
                "title" => $request->input("title"),
                "closing" => $request->input("closing"),
                "closing_time" => $request->input("closing_time"),
                "status" => CashRegisterStatus::CLOSE,
            ];
            CashRegister::where('id', $id)->update($arr);
            Toastr::success('Update Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (CashRegister::where("id", $id)->forceDelete()) {
            Toastr::error('Deleted Successfully', 'Warning');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }
        return redirect()->back();
    }

}
