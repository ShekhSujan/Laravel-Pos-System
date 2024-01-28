<?php

use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CashRegisterController;
use App\Http\Controllers\PaymentMethodController;

//Backend Routes

Auth::routes([
    'login' => true, // Registration Routes...
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
Route::middleware(['auth', 'can:AdminUser'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //SuperAdmin Routes
    Route::middleware('can:SuperAdmin')->group(function () {
        Route::get("/admin", [UserController::class, 'index'])->name("admin.index");
        Route::get("/admin/user", [UserController::class, 'user'])->name("admin.user");
        Route::get("/admin/create", [UserController::class, 'create'])->name("admin.create");
        Route::post("/admin", [UserController::class, 'store'])->name("admin.store");
        Route::get("/admin/edit/{id}", [UserController::class, 'edit'])->name("admin.edit");
        Route::post("/admin/update", [UserController::class, 'update'])->name("admin.update");
        Route::get("/admin/trash-list", [UserController::class, 'trash_list'])->name("admin.trash_list");
        Route::post("/admin/trash", [UserController::class, 'trash'])->name("admin.trash");
        Route::post("/admin/bulk-action", [UserController::class, 'bulk_action'])->name("admin.bulk_action");
        Route::get("/admin/change-password/{id}", [UserController::class, 'change_password'])->name("admin.change_password");
    });
    Route::middleware('can:update-user')->group(function () {
        Route::get("/profile/update", [UserController::class, 'profile_edit'])->name("profile.profile_update");
        Route::post("/profile/update", [UserController::class, 'profile_update'])->name("profile.update");
        Route::get("/profile/change-password", [UserController::class, 'changes_password'])->name("profile.change_password");
        Route::post("/admin/update-password", [UserController::class, 'update_password'])->name("admin.update_password");
    });

    Route::middleware(['can:AdminUser'])->group(function () {
        //Setting Routes
        Route::get('/setting', [SettingController::class, 'index'])->name('setting');
        Route::post('/setting-update', [SettingController::class, 'update'])->name('setting.update');

        //Category Routes
        Route::get("/category", [CategoryController::class, 'index'])->name("category.index");
        Route::get("/category/create", [CategoryController::class, 'create'])->name("category.create");
        Route::post("/category", [CategoryController::class, 'store'])->name("category.store");
        Route::get("/category/edit/{id}", [CategoryController::class, 'edit'])->name("category.edit");
        Route::post("/category/update", [CategoryController::class, 'update'])->name("category.update");
        Route::get("/category/trash-list", [CategoryController::class, 'trash_list'])->name("category.trash_list")->middleware('can:Admin');
        Route::post("/category/trash", [CategoryController::class, 'trash'])->name("category.trash")->middleware('can:Admin');
        Route::post("/category/bulk-action", [CategoryController::class, 'bulk_action'])->name("category.bulk_action")->middleware('can:Admin');

        //Brands Routes
        Route::get("/brand", [BrandController::class, 'index'])->name("brand.index");
        Route::get("/brand/create", [BrandController::class, 'create'])->name("brand.create");
        Route::post("/brand", [BrandController::class, 'store'])->name("brand.store");
        Route::get("/brand/edit/{id}", [BrandController::class, 'edit'])->name("brand.edit");
        Route::post("/brand/update", [BrandController::class, 'update'])->name("brand.update");
        Route::get("/brand/trash-list", [BrandController::class, 'trash_list'])->name("brand.trash_list")->middleware('can:Admin');
        Route::post("/brand/trash", [BrandController::class, 'trash'])->name("brand.trash")->middleware('can:Admin');
        Route::post("/brand/bulk-action", [BrandController::class, 'bulk_action'])->name("brand.bulk_action")->middleware('can:Admin');

        //Supplier Routes
        Route::get("/supplier", [SupplierController::class, 'index'])->name("supplier.index");
        Route::get("/supplier/create", [SupplierController::class, 'create'])->name("supplier.create");
        Route::post("/supplier", [SupplierController::class, 'store'])->name("supplier.store");
        Route::get("/supplier/edit/{id}", [SupplierController::class, 'edit'])->name("supplier.edit");
        Route::post("/supplier/update", [SupplierController::class, 'update'])->name("supplier.update");
        Route::get("/supplier/trash-list", [SupplierController::class, 'trash_list'])->name("supplier.trash_list")->middleware('can:Admin');
        Route::post("/supplier/trash", [SupplierController::class, 'trash'])->name("supplier.trash")->middleware('can:Admin');
        Route::post("/supplier/bulk-action", [SupplierController::class, 'bulk_action'])->name("supplier.bulk_action")->middleware('can:Admin');

        Route::get("/product", [ProductController::class, 'index'])->name("product.index");
        Route::get("/product/inactive", [ProductController::class, 'inactive'])->name("product.inactive");
        Route::get("/product/filter", [ProductController::class, 'filter'])->name("product.filter");
        Route::get("/product/create", [ProductController::class, 'create'])->name("product.create");
        Route::post("/product", [ProductController::class, 'store'])->name("product.store");
        Route::get("/product/edit/{id}", [ProductController::class, 'edit'])->name("product.edit");
        Route::post("/product/update", [ProductController::class, 'update'])->name("product.update");
        Route::get("/product/trash-list", [ProductController::class, 'trash_list'])->name("product.trash_list");
        Route::post("/product/trash", [ProductController::class, 'trash'])->name("product.trash");
        Route::post("/product/bulk-action", [ProductController::class, 'bulk_action'])->name("product.bulk_action");

        //Stock
        Route::get("/stock", [StockController::class, 'index'])->name("stock.index");
        Route::get("/stock/all", [StockController::class, 'all'])->name("stock.all");
        Route::get("/stock-product/{id}", [StockController::class, 'product'])->name("stock.product");
        Route::get("/stock/filter", [StockController::class, 'filter'])->name("stock.filter");
        Route::post("/stock", [StockController::class, 'store'])->name("stock.store");

        Route::get("/stock/edit/{id}", [StockController::class, 'edit'])->name("stock.edit");
        Route::get("/stock/supplier/{id}", [StockController::class, 'supplier'])->name("stock.supplier");
        Route::post("/stock/update", [StockController::class, 'update'])->name("stock.update");
        Route::post("/stock/bulk-action", [StockController::class, 'bulk_action'])->name("stock.bulk_action");

        //Payment Method Routes
        Route::get("/payment-method", [PaymentMethodController::class, 'index'])->name("payment-method.index");
        Route::get("/payment-method/create", [PaymentMethodController::class, 'create'])->name("payment-method.create");
        Route::post("/payment-method", [PaymentMethodController::class, 'store'])->name("payment-method.store");
        Route::get("/payment-method/edit/{id}", [PaymentMethodController::class, 'edit'])->name("payment-method.edit");
        Route::post("/payment-method/update", [PaymentMethodController::class, 'update'])->name("payment-method.update");
        Route::get("/payment-method/trash-list", [PaymentMethodController::class, 'trash_list'])->name("payment-method.trash_list");
        Route::post("/payment-method/trash", [PaymentMethodController::class, 'trash'])->name("payment-method.trash");
        Route::post("/payment-method/bulk-action", [PaymentMethodController::class, 'bulk_action'])->name("payment-method.bulk_action");

        Route::get("/order/create", [OrderController::class, 'create'])->name("order.create");
        Route::get("/order/store", [OrderController::class, 'store'])->name("order.store");
        Route::get("/order/edit/{id}", [OrderController::class, 'edit'])->name("order.edit");
        Route::post("/order/update", [OrderController::class, 'update'])->name("order.update");
        Route::post("/order/trash", [OrderController::class, 'trash'])->name("order.trash");
        Route::get("/order/trash-list", [OrderController::class, 'trash_list'])->name("order.trash_list");
        Route::post("/order/bulk-action", [OrderController::class, 'bulk_action'])->name("order.bulk_action");

        Route::get("/order/pending", [OrderController::class, 'pending'])->name("order.pending");
        Route::get("/order/pos-sales", [OrderController::class, 'pos_sales'])->name("order.pos_sales");
        Route::post("/order/order-update", [OrderController::class, 'order_update'])->name("order.order_update");

        Route::get("/order/today", [OrderController::class, 'today'])->name("order.today");
        Route::get("/order/month", [OrderController::class, 'month'])->name("order.month");
        Route::get("/order/filter", [OrderController::class, 'filter'])->name("order.filter");

        Route::get('/generate-invoice/{id}', [InvoiceController::class, 'invoice'])->name('invoice');
        Route::get('/pos-invoice/{id}', [InvoiceController::class, 'pos_invoice'])->name('pos_invoice');
        Route::get('/invoice-setting', [InvoiceController::class, 'invoice_setting'])->name('invoice.setting');
        Route::post('/invoice-setting-update', [InvoiceController::class, 'invoice_update'])->name('invoice.setting.update');

        //
        //Cash Register
        Route::get("/cash", [CashRegisterController::class, 'index'])->name("cash.index");
        Route::post("/cash", [CashRegisterController::class, 'store'])->name("cash.store");
        Route::get("/cash/edit/{id}", [CashRegisterController::class, 'edit'])->name("cash.edit");
        Route::post("/cash/update", [CashRegisterController::class, 'update'])->name("cash.update");
        Route::post("/cash/trash", [CashRegisterController::class, 'trash'])->name("cash.trash")->middleware('can:Admin');
    });


    Route::get('/dashboard/clear-log', function () {
        try {
            Artisan::call('log:clear');
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            Toastr::success('Log Cleared Successfully', 'Success');
            return redirect()->back();
        } catch (\Throwable $th) {
            Toastr::error('Some Error Occcurs', 'Danger');
            return redirect()->back();
        }
    })->name('clear_log');

    View::composer(['*'], function ($views) {
        $allSetting =  Setting::first();
        $views->with('allSetting', $allSetting);
    });
});
