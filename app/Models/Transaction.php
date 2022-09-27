<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name', 
        'email', 
        'number',  
        'address',
        'transaction_total',
        'transaction_status'
    ];

    protected $hidden = [
        
    ];

    public function details()
    {
        //mengapa memakai hasMany, karena 1 transaction memiliki beberapa detail transaction
        return $this->hasMany(TransactionDetail::class, 'transactions_id');
    }
}
