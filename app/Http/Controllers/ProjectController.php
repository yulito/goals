<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Action;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Funciones para el CRUD DE PROJECT
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project' => 'required|max:70',
            'list1'   => 'required|max:70',
            'list2'   => 'required|max:70'  
        ]);

        /* ------- Para imagen ------- */
        $image = $request->file('photo');
        if($image)
        {
            $image_name = time().$image->getClientOriginalName();
            Storage::disk('public')->put($image_name, File::get($image));
        }else{
            $image_name = null;
        }
        /* --------------------------- */

        $project = new Project;
        $project->title     = $request->project;
        $project->list1     = $request->list1;
        $project->list2     = $request->list2;   
        $project->photo     = $image_name;
        $project->id        = auth()->user()->id;
        $project->id_status     = 4;
        $project->save();
        
        return redirect('/home');
    }



    

    public function showWork($id)
    {
        $project = Project::where('id_project', $id)
                    ->where('id', auth()->user()->id)                    
                    ->get();
        $action = Action::where('id_project', $id)->get();

        //redireccionar en caso de url de proyecto no corresponda
        $i = 0;
        foreach($project as $proj){ $i = $proj->id_status;}
        if($i == 1)
            { return view('layouts.work',['obj'=>$project, 'act'=> $action]);
            }else{ return redirect('/home');}
    }

    public function work($id)
    {
        Project::where('id_project', $id)
                ->where('id', auth()->user()->id)
                ->update(['id_status' => 1]);                
        return $this->showWork($id);
    }    

    //Estado project desechado
    public function toTrashed($id, $nro)
    {
        Project::where('id_project', $id)
                ->where('id', auth()->user()->id)
                ->update(['id_status' => 3, 'date_end' => \Carbon\Carbon::now()]);

        //retornar vista segun ubicación actual
        if($nro == 1){
            return redirect('/home');
        }elseif($nro == 3){
            return $this->completed();
        }
        else{
            return $this->pending();}                      
    }

    //Estado project completado
    public function toCompleted($id)
    {
        Project::where('id_project',$id)
                ->where('id', auth()->user()->id)
                ->update(['id_status' => 2, 'date_end' => \Carbon\Carbon::now()]);

        return $this->pending();
    }

    //-------------------------------------------------------
    //Vista pendiente
    public function pending()
    {   
        $project = Project::where('id_status', 1)
                    ->where('id', auth()->user()->id)
                    ->paginate(6);
        return view('layouts.pending',['list'=>$project]);       
    }

    //Vista completed
    public function completed()
    {   
        $project = Project::where('id_status', 2)
                    ->where('id', auth()->user()->id)
                    ->get();
        return view('layouts.completed',['list'=>$project]);       
    }

    //Vista desechado
    public function trashed()
    {
        $project = Project::where('id_status', 3)
                    ->where('id', auth()->user()->id)
                    ->get();        
        return view('layouts.trashed',['list'=>$project]);
    }

    //vista de proyecto completado
    public function showProject($id)
    {
        $project = Project::where('id_project', $id)
                    ->where('id', auth()->user()->id)                    
                    ->get();
        $action = Action::where('id_project', $id)->get();

        //redireccionar en caso de url de proyecto no corresponda
        $i = 0;
        foreach($project as $proj){ $i = $proj->id_status;}
        if($i == 2)
            { return view('layouts.showProyect',['obj'=>$project, 'act'=> $action]);
            }else{ return redirect('/home');}
    }
    
}
