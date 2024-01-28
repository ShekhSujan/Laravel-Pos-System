<?php

namespace App\Models;

use App\Models\Stock;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'suppliers';
    protected $fillable = [

        'title',
        'email',
        'city',
        'zipcode',
        'address',
        'mobile',
        'status',
    ];
    protected $casts = [
        'status' => StatusEnum::class,
    ];
    public function stock()
    {
        return $this->hasMany(Stock::class, 'supplier_id', 'id');
    }
}
