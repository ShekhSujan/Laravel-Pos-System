<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends BaseModel
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'brands';
    protected $fillable = [
        'title',
        'image',
        'status',
    ];

}
