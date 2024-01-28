<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CashRegister extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'cash_register';
    protected $fillable = [

        'title',
        'opening',
        'closing',
        'opening_time',
        'closing_time',
        'status',
    ];


}
