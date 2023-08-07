@extends('layouts.app')

@section('content')

@foreach($obj as $project)
        <h1 class="h1 text-center fontitle"> <u>{{ $project->title }}</u> </h1>
    
        <div class="container">
            <div class="row py-4 prolist">
                <div class="col-5 left-side " style="padding: 10px;">                
                    <table class="table table-hover " >
                        <thead class="sticky-top">
                            <tr>
                            <th scope="col"><div class="h2 fontitle text-center  ">{{ $project->list1 }}</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!---------------- Aquí va la logica con ciclo for ------------------>
                            @foreach($act as $action)
                            @if($action->id_type == 1)
                            <tr>                                                                    
                                <td  tabindex="0" data-bs-toggle="popover" 
                                    data-bs-trigger="hover focus" data-bs-content="{{ $action->about }}">                                    
                                    
                                    <!----------------------------------------------------------->
                                    <form action="{{ route('delAction',[$action->id_action,$project->id_project]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="del-td btn btn-link text-start" 
                                            data-bs-toggle="popover" 
                                            data-bs-trigger="hover focus" 
                                            title="clic para eliminar">

                                            {{ $action->name }}                                                                                
                                        </button>  
                                    </form>
                                </td>                                         
                            </tr>
                            @endif
                            @endforeach
                            <!------------------------------------------------------------------->
                        </tbody>
                    </table>
                </div>

                <div class="col-2 text-center">
                    <div class="col justify-content-start">
                        <div class="btnplus">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#action-modal">
                            Agregar
                        </button>
                        </div>                        
                    </div>

                    <div>
                        <a href="{{ url('/home') }}" class="btn btn-link">Volver</a>
                    </div>
                    <!--------------- ERRORES ----------------->
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!----------------------------------------->
                </div>                

                <div class="col-5 right-side " style="padding: 10px;">
                    <table class="table table-hover">
                        <thead class="sticky-top">
                            <tr>
                            <th scope="col"><div class="h2 fontitle text-center ">{{ $project->list2 }}</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!---------------- Aquí va la logica con ciclo for ------------------>
                            @foreach($act as $action)
                            @if($action->id_type == 2)
                            <tr>                                                                    
                                <td  tabindex="0" data-bs-toggle="popover" 
                                    data-bs-trigger="hover focus" data-bs-content="{{ $action->about }}">                                    
                                    <form action="{{ route('delAction',[$action->id_action,$project->id_project]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="del-td btn btn-link text-start" 
                                            data-bs-toggle="popover" 
                                            data-bs-trigger="hover focus" 
                                            title="clic para eliminar">
                                            {{ $action->name }}
                                        </button>  
                                    </form>                                     
                                </td>                                        
                            </tr>
                            @endif
                            @endforeach
                            <!------------------------------------------------------------------->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    @endforeach

    <!------------------------------------- MODAL ----------------------------------->
        
    <div class="modal fade" id="action-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva acción/tarea</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{ url('/action/'.$project->id_project) }}" method="post">
        @csrf

            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre de acción/tarea</label>
                    <input type="text" class="form-control" id="action" name="action">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="option" aria-label="Default select example" required>
                        <option selected>Selecciona una opción...</option>
                        <option value="1">{{ $project->list1 }}</option>
                        <option value="2">{{ $project->list2 }}</option>
                    </select>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

            </div>
        </div>
    </div>



@endsection