<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Enums\TrashActionEnum;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\CategoryRequest;
use App\Traits\UploadTrait;
use Exception;

class CategoryController extends Controller
{
    use  UploadTrait;
    public function index()
    {

        $data['title'] = "All Category";
        $data['allCategory'] = Category::latest('id')->get();
        return view("pages.category.index")->with($data);
    }
    public function create()
    {
        $data['title'] = "Add New Category";
        return view("pages.category.create")->with($data);
    }

    public function store(CategoryRequest $request)
    {
        try {
            $image = $request->file('image');
            if ($image) {
                $image_name = $this->uploadImage($image, "assets/uploads/category/", [300, 300]);
            }
            $arr = [
                "title" => $request->input("title"),
                "status" => StatusEnum::Active,
                "image" => $image_name ?? '',
            ];

            Category::create($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update Category";
        $data['selected'] = Category::findOrFail($id);
        return view("pages.category.edit")->with($data);
    }

    public function update(CategoryRequest $request)
    {
        try {
            $id = $request->input("id");
            $oldimage = $request->input("image_name");
            $image = $request->file("image");

            if ($image) {
                $image_name = $this->uploadImage($image, "assets/uploads/category/", [300, 300], $oldimage);
            }
            $arr = [
                "title" => $request->input("title"),
                "status" => $request->input("status"),
                "image" => $image_name ?? $oldimage,
            ];

            Category::where('id', $id)->update($arr);
            Toastr::success('Update Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function trash_list()
    {
        $data['title'] = 'Trash List';
        $data['allCategory'] = Category::onlyTrashed()->latest()->get();
        return view('pages.category.trash-list')->with($data);
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (Category::where("id", $id)->delete()) {
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
            $data = Category::onlyTrashed()->whereIn("id", $id)->get();
            foreach ($data as $value) {
                if (is_file($value->image)) {
                    unlink($value->image);
                }
                Category::where("id", $value->id)->forceDelete();
            }
            Toastr::success('Deleted Successfully', 'Success');
        } elseif ($type == TrashActionEnum::Restore->value && $id) {
            Category::whereIn("id", $id)->restore();
            Toastr::success('Restored Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
}
