<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'customer_name',
        'customer_description',
    ];

    public function customer_alamat(): HasMany
    {
        return $this->hasMany(CustomerAlamat::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class);
    }
}
