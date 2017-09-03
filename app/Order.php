<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['recieverName', 'address', 'user_id', 'cart', 'payment_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
