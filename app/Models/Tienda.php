<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tienda extends Authenticatable
{
    use HasFactory;
    protected $table = 'tiendas';
    protected $primaryKey = 'id';
    public $incrementing = false;
}
