<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Stock;
use App\Models\Category;
use App\Enums\StatusEnum;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'products';
    protected $fillable = [
        'title',
        'sku',
        'category_id',
        'brand_id',
        'buy_price',
        'selling_price',
        'offer_price',
        'offer',
        'offer_validity',
        'feature',
        'image',
        'status',
    ];
    protected $casts = [
        'status' => StatusEnum::class,
    ];
    protected $hidden = [
        'image', 'created_at', 'updated_at', 'deleted_at'
    ];
    protected $appends = ['image_url','stock_availability'];

    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return asset("assets/default-image/thumnail.jpg");
        }
        return url('/') . '/' . $this->image;
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault([
            'title' => '',
        ]);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id')->active()->withDefault([
            'title' => '--',
        ]);
    }
    public function scopeActive($query)
    {
        return $query->where('status', StatusEnum::Active->value);
    }
    public function scopeOffer($query)
    {
        return $query->where('status', StatusEnum::Active->value)->where('offer',1)->whereDate('offer_validity','>=',Carbon::today());
    }
    public function scopeInactive($query)
    {
        return $query->where('status', StatusEnum::Inactive->value);
    }
    public function stock()
    {
        return $this->hasMany(Stock::class, 'product_id', 'id');
    }

    public function sumOfStockWithType1()
    {
        return $this->stock->where('type', 1)->sum('in_qty');
    }
    public function sumOfStockWithType2()
    {
        return $this->stock->where('type', 2)->sum('out_qty');
    }
    public function stockStatus()
    {
        $stock = ($this->sumOfStockWithType1()) - ($this->sumOfStockWithType2());
        if ($stock > 1) {
            return '<span class="badge badge-success">Enough Stock</span>';
        } else {
            return '<span class="badge badge-danger">Reorder</span>';
        }
    }
    public function hasStock()
    {
        $stock = ($this->sumOfStockWithType1()) - ($this->sumOfStockWithType2());
        if ($stock > 1) {
            return true;
        }
    }


    public function getStockAvailabilityAttribute()
    {
        $inStock = $this->sumOfStockWithType1();
        $outStock = $this->sumOfStockWithType2();
        if ($inStock > $outStock) {
            return true;
        } else {
            return false;
        }
    }

    public function price()
    {
        if ($this->offer == 1) {
            return $this->offer_price;
        } else {
            return $this->selling_price;
        }
    }
}
