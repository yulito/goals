<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "project";
    protected $primarykey = "id_project";

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'id_status');
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }

    
}
