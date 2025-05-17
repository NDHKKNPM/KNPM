<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
//                 $table->id(); // Order ID
//             $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
//             $table->foreignId('transporter_id')->constrained('transporters')->onDelete('cascade'); // Foreign key to transportations table
//             $table->string('status')->default('pending'); // Order status
//             $table->string('address'); // Shipping address
    protected $fillable = [
        'user_id',
        'transporter_id',
        'status',
        'address'
    ];

}
