<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerAlamat extends Model
{
    use HasFactory;

    protected $table = 'customer_alamat';

    protected $fillable = [
        'customer_id',
        'customer_alamat',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customerid');
    }
}
