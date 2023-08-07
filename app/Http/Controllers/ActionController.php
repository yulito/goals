<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\Project;
use Illuminate\Support\Facades\Http;

class ActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $idproj)
    {
        $validated = $request->validate([
            'action'        => 'required|max:60',
            'description'   => 'required|max:6000',
            'option'        => 'required|max:1'
        ]);

        $action             = new Action;
        $action->name       = $request->action;
        $action->about      = $request->description;
        $action->id_type    = $request->option;
        $action->id_status  = 1;
        $action->id_project = $idproj;
        $action->save();

        $project = Project::where('id_project', $idproj)
                    ->where('id', auth()->user()->id)
                    ->get();
        $action = Action::where('id_project', $idproj)->get();
        
       return view('layouts.work',['obj'=>$project, 'act'=> $action]);
    }

    public function delAction($id, $proj)
    {
        $action = Action::where('id_action',$id);
        $action->delete();

        $project = Project::where('id_project', $proj)
                    ->where('id', auth()->user()->id)
                    ->get();
        $action = Action::where('id_project', $proj)->get();
        
       return view('layouts.work',['obj'=>$project, 'act'=> $action]);
    }

    public function deleteOne($id)
    {
        $action = Action::where('id_project',$id);
        $action->delete();
        $project = Project::where('id_project',$id);
        $project->delete();
        return redirect('/trashed');        
    }

    public function delete($list)
    {
        $li = json_decode($list);
        foreach($li as $i)
        {
            $action = Action::where('id_project',$i->id_project);
            $action->delete();
            $project = Project::where('id_project',$i->id_project);
            $project->delete();            
        }
        return redirect('/trashed');
    }
    
}
