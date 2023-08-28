<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventadetalles extends Model
{
    use HasFactory;
    protected $primaryKey = 'idvd';
    protected $fillable=['idvd','idve','idv','cliente','idp','cantidad','precio','costo','promocion'];
}
