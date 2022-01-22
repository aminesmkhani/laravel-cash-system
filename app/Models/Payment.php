<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'amount',
        'status',
        'method',
        'gateway',
        'ref_num'
    ];


    protected $attributes=[
      'status' => 0
    ];

    public function isOnline()
    {
        return $this->method === 'online';
    }

    public function confirm(string $refNum , string $gateway = null)
    {
        $this->ref_num = $refNum;
        $this->gateway = $gateway;
        $this->status = 1;
        $this->save();
    }

}
