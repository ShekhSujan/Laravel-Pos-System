<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Enums\TrashActionEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Traits\UploadTrait;
use Exception;

class BrandController extends Controller
{
    use  UploadTrait;
    public function index()
    {

        $data['title'] = "All Brands";
        $data['allBrand'] = Brand::latest('id')->get();
        return view("pages.brand.index")->with($data);
    }
    public function create()
    {
        $data['title'] = "Add New Brands";
        return view("pages.brand.create")->with($data);
    }

    public function store(BrandRequest $request)
    {
        try {
            $image = $request->file('image');
            if ($image) {
                $image_name = $this->uploadImage($image, "assets/uploads/brands/", [300, 300]);
            }
            $arr = [
                "title" => $request->input("title"),
                "status" => StatusEnum::Active,
                "image" => $image_name ?? '',
            ];

            Brand::create($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update brand";
        $data['selected'] = Brand::findOrFail($id);
        return view("pages.brand.edit")->with($data);
    }

    public function update(BrandRequest $request)
    {
        try {
            $id = $request->input("id");
            $oldimage = $request->input("image_name");
            $image = $request->file("image");

            if ($image) {
                $image_name = $this->uploadImage($image, "assets/uploads/brands/", [300, 300], $oldimage);
            }
            $arr = [
                "title" => $request->input("title"),
                "status" => $request->input("status"),
                "image" => $image_name ?? $oldimage,
            ];

            Brand::where('id', $id)->update($arr);
            Toastr::success('Update Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function trash_list()
    {
        $data['title'] = 'Trash List';
        $data['allBrand'] = Brand::onlyTrashed()->latest()->get();
        return view('pages.brand.trash-list')->with($data);
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (Brand::where("id", $id)->delete()) {
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
            $data = Brand::onlyTrashed()->whereIn("id", $id)->get();
            foreach ($data as $value) {
                if (is_file($value->image)) {
                    unlink($value->image);
                }
                Brand::where("id", $value->id)->forceDelete();
            }
            Toastr::success('Deleted Successfully', 'Success');
        } elseif ($type == TrashActionEnum::Restore->value && $id) {
            Brand::whereIn("id", $id)->restore();
            Toastr::success('Restored Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
}
