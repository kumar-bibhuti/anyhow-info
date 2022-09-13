<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table='inventory';
    protected $fillable = [
        'p_id',
        'p_name',
        'vendor',
        'mrp',
        'batch_no',
        'batch_date',
        'qty',
        'status'
    ];
}