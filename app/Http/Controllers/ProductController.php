<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Enums\StatusEnum;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Enums\TrashActionEnum;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    use  UploadTrait;
    public function index()
    {
        $data['title'] = "All Product";
        $data['allProduct'] = Product::with(['category', 'brand'])
            ->latest('id')
            ->get();

        return view("pages.product.index")->with($data);
    }
    public function inactive()
    {
        $data['title'] = "Inactive Product";
        $data['allProduct'] = Product::with(['category', 'brand'])->inactive()
            ->latest('id')
            ->get();

        return view("pages.product.inactive")->with($data);
    }
    public function filter(Request $request)
    {
        $data['title'] = "Filter Product";
        $data['allCategory'] = Category::active()
            ->latest('id')
            ->get();
        $data['allBrand'] = Brand::active()
            ->latest('id')
            ->get();
        if ($request->input()) {
            $sql = Product::query();
            if ($request->get("category_id")) {
                $sql = $sql->where("category_id", $request->get("category_id"));
            }
            if ($request->get("brand_id")) {
                $sql = $sql->where("brand_id", $request->get("brand_id"));
            }

            $data['allProduct'] = $sql->with(['category', 'brand'])
                ->latest('id')
                ->get();
        }
        return view("pages.product.filter")->with($data);
    }
    public function create()
    {
        $data['title'] = "Add New Product";
        $data['allCategory'] = Category::active()
            ->latest('id')
            ->get();

        $data['allBrand'] = Brand::active()
            ->latest('id')
            ->get();
        return view("pages.product.create")->with($data);
    }

    public function store(ProductRequest $request)
    {

        try {
            $image = $request->file('image');
            if ($image) {
                $image_name = $this->uploadImage($image, "assets/uploads/product/", [200, 200]);
            }
            $arr = [
                "title" => $request->input("title"),
                "sku" => $request->input("sku"),
                "category_id" => $request->input("category_id"),

                "brand_id" => $request->input("brand_id"),
                "buy_price" => $request->input("buy_price"),
                "selling_price" => $request->input("selling_price"),
                "offer_price" => $request->input("offer_price"),
                "offer" => $request->input("offer"),
                "offer_validity" => $request->input("offer_validity"),
                "feature" => $request->input("feature"),
                "status" => StatusEnum::Active,
                "image" => $image_name ?? '',
            ];

            Product::create($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update Product";
        $data['selected'] = Product::findOrFail($id);
        $data['allCategory'] = Category::active()
            ->latest('id')
            ->get();

        $data['allBrand'] = Brand::active()
            ->latest('id')
            ->get();
        return view("pages.product.edit")->with($data);
    }

    public function update(ProductRequest $request)
    {
        try {
            $id = $request->input("id");
            $oldimage = $request->input("image_name");
            $image = $request->file("image");

            if ($image) {
                $image_name = $this->uploadImage($image, "assets/uploads/product/", [200, 200], $oldimage);
            }
            $arr = [
                "title" => $request->input("title"),
                "sku" => $request->input("sku"),
                "category_id" => $request->input("category_id"),

                "brand_id" => $request->input("brand_id"),
                "buy_price" => $request->input("buy_price"),
                "selling_price" => $request->input("selling_price"),
                "offer_price" => $request->input("offer_price"),
                "offer" => $request->input("offer"),
                "offer_validity" => $request->input("offer_validity"),
                "feature" => $request->input("feature"),
                "status" => $request->input("status"),
                "image" => $image_name ?? $oldimage,
            ];

            Product::where('id', $id)->update($arr);
            Toastr::success('Update Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function trash_list()
    {
        $data['title'] = 'Trash List';
        $data['allProduct'] = Product::with(['category', 'brand'])->onlyTrashed()->latest()->get();
        return view('pages.product.trash-list')->with($data);
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (Product::where("id", $id)->delete()) {
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
            $data = Product::onlyTrashed()->whereIn("id", $id)->get();
            foreach ($data as $value) {
                if (is_file($value->image)) {
                    unlink($value->image);
                }
                Product::where("id", $value->id)->forceDelete();
            }
            Toastr::success('Deleted Successfully', 'Success');
        } elseif ($type == TrashActionEnum::Restore->value && $id) {
            Product::whereIn("id", $id)->restore();
            Toastr::success('Restored Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
}
