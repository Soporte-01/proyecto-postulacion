<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDesignModel extends Model
{
    protected $table = 'user_design';

    protected $fillable = [
        'user_id',
        'design_id'
    ];
}
