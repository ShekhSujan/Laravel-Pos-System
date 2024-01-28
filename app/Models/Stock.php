<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'stocks';
    protected $fillable = [
        'order_id',
        'product_id',
        'supplier_id',
        'in_date',
        'in_qty',
        'out_date',
        'out_qty',
        'type',
        'remarks',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id')->withDefault([
            'title' => '--',
        ]);
    }
}
