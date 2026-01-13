<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEmpresaModel extends Model
{
    protected $table = 'asociation';

    protected $fillable = [
        'user_id',
        'empresa_id'
    ];
}
