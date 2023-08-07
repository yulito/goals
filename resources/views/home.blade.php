@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="box-btn-cross row justify-content-center align-item-center">
             <a href="#" data-bs-toggle="modal" data-bs-target="#Nuevo-proyecto">        
                <div class="btn-cross" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Nuevo" >
                    <span id="cross"></span>
                </div>            
            </a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!------------------------------------------------------------------------------------------->

        <!-- Modal NUEVO -->
            <div class="modal fade" id="Nuevo-proyecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{url('/project')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!---- formulario nuevo MODAL ------->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nombre de Proyecto</label>
                            <input type="text" class="form-control" id="project" name="project">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nombre lista 1</label>
                            <input type="text" class="form-control" id="list1" name="list1">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nombre lista 2</label>
                            <input type="text" class="form-control" id="list2" name="list2">
                            
                        </div>
                        <div class="mb-3">
                            <label class="input-group-text" for="inputGroupFile02">Imagen</label> 
                            <input type="file" class="form-control" id="photo" name="photo">
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-info" value="Guardar">
                    </div>
                </form>

                </div>
            </div>
            </div>

        <!------------------------------------------------------------------------------------------->
        
        <div class="listgoals row justify-content-center">
        <hr>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Proyecto</th>
                    <th scope="col">Fecha-creación</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <!---------------- Aquí va la logica con ciclo for ------------------>
                    @if($list)                                      
                    <?php $i = 0 ?> 
                    @foreach($list as $item)
                    <tr>                                                
                        <th scope="row">{{ $i += 1 }}</th>                        
                        <td>{{ $item->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->date_ini)->format('d/m/y') }}</td>
                        <td class="text-end">
                            <a href="{{ route('project.work',$item->id_project) }}" 
                                class="btn btn-primary" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Iniciar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill-up" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0Z"/>
                                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.493 4.493 0 0 0 12.5 8a4.493 4.493 0 0 0-3.59 1.787A.498.498 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.476 4.476 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1V1Zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
                                </svg>
                            </a>
                        </td>   
                        <td>                               
                            <a href="{{ route('totrash',[$item->id_project, 1]) }}" class="btn btn-warning"
                            data-bs-toggle="popover" data-bs-trigger="hover focus" title="Papelera">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                            </a>                                                  
                        </td>                     
                    </tr>
                    
                    @endforeach
                    @endif
                    <!------------------------------------------------------------------->
                </tbody>
            </table>
        </div>        
    </div>
</div>
@endsection
