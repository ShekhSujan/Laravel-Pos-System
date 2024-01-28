<?php

namespace App\Models;

use App\Models\Product;
use App\Models\BaseModel;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends BaseModel
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'categories';
    protected $fillable = [
        'title',
        'image',
        'status',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->active();
    }
}
