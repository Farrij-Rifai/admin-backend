<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'transactions_id',
        'products_id'
    ];

    protected $hidden = [
        
    ];

    public function transaction()
    {
        //mengapa memakai belongsTo, karena hanya menyambungkan 'transactions_id' di tabel detail(foreignKey) dengan di tabel transaction
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }
    
    public function product()
    {
        //mengapa memakai belongsTo, karena hanya menyambungkan 'products_id' di tabel detail(foreignKey) dengan di tabel product
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
