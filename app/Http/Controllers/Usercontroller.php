<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function deleteAccount(Request $request)
    {
        $project = Project::where('id',auth()->user()->id)->get();
        foreach($project as $proj)
        {
            $action = Action::where('id_project',$proj->id_project);
            $action->delete();   
            if($proj->photo){
                Storage::disk('public')->delete($proj->photo);
            }
            
        }
        $project = Project::where('id',auth()->user()->id);
        
        $project->delete();
        
        $user = User::where('id',auth()->user()->id);
        auth()->logout();

        if ($user->delete()) {

            return view('welcome')->with('global', 'Your account has been deleted!');
        }
    }
}
