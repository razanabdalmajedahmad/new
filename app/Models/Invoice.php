<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'date',
        'namber',
        'company_name',
        'customer_name',
        'customer_address',
        'customer_email',
        'total'
    ];
    public function item()
    {
    	return $this->hasMany(Item::class,'invoice_id');
    }
}
