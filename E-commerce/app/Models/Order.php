<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_amount', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    use HasFactory;
    public function status_changes()
    {
        return $this->hasMany(OrderStatusChange::class)->orderBy('created_at', 'desc');
    }
}
