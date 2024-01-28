<?php

namespace App\Models;

use Faker\Provider\Base;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceSetting extends Model
{
    use HasFactory;
    protected $table = 'invoice_settings';
    protected $fillable = [
        'title',
        'email',
        'phone',
        'address',
        'image',
        'tax',
        'tax_status',
        'discount',
    ];
    protected $casts = [
        'status' => StatusEnum::class,
    ];
    protected $hidden = [
        'image', 'created_at', 'updated_at', 'deleted_at'
    ];
    protected $appends = ['image_url', 'pad_url', 'qr_url'];

    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return asset("assets/default-image/thumnail.jpg");
        }
        return url('/') . '/' . $this->image;
    }
    public function getPadUrlAttribute()
    {
        return url('/') . '/' . $this->pad;
    }
    public function getQrUrlAttribute()
    {
        return url('/') . '/' . $this->qr;
    }
}
