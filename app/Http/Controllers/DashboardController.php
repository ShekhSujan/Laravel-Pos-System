<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {

        $data['title'] = 'Dashboard';

        $data['allCategory'] = Category::count();
        $data['allBrand'] = Brand::count();
        $data['allProduct'] = Product::count();
        $data['allOrder'] = Order::count();
        $data['allPaymentMethod'] = PaymentMethod::count();
        $data['allSupplier'] = Supplier::count();

        $data['allPosOrder'] = Order::take(10)->latest('id')->get();

        $data['allProductStock'] = Product::latest('id')->get();

        return view('pages.index')->with($data);
    }
}
