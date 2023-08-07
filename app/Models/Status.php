<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';
    protected $primarykey = 'id_status';

    public function project()
    {
        return $this->hasMany('App\Project');
    }

    public function action()
    {
        return $this->hasMany('App\Action');
    }
}
