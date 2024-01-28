<?php

namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends BaseModel
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'total',
        'price',
    ];

protected $with=['products'];
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
