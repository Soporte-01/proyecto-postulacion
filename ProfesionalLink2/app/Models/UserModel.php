<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DesignModel;

class UserModel extends Model
{
    protected $table = 'user';

    protected $fillable = [
        'name',
        'password',
        'email',
        'foto',
        'design_id',
    ];
    protected $hidden = [
        'password',
    ];
    public function design()
    {
        return $this->belongsTo(DesignModel::class);
    }
}
