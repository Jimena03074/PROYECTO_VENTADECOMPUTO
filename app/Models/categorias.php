<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    protected $primaryKey ='idc';
    protected $fillable=['idc','nombreC','descripcion'];
}
