<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $table = 'action';
    protected $primarykey = 'id_action';

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'id_status');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'id_type');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
