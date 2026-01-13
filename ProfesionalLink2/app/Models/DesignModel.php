<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignModel extends Model
{
    protected $table = 'design';

    protected $fillable = [
        'puesto',
        'color1',
        'color2',
        'link1',
        'link2',
        'link3'
    ];
}
