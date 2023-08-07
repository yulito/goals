<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'type';
    protected $primarykey = 'id_type';

    public function action()
    {
        return $this->hasMany('App\Action');
    }
}
