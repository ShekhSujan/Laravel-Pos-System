<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'payment_methods';
    protected $fillable = [
        'title',
        'status',
    ];
    protected $casts = [
        'status' => StatusEnum::class,
    ];
}
