<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'price', 'stock', 'image', 'description', 'vendor_id', 'status'];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
}
