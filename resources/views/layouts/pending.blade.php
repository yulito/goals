@extends('layouts.app')

@section('content')

    <h4 class="h4 text-center fontitle">Pendientes</h4><br>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!---------------- Aquí va la logica con ciclo for ------------------>
            @if(count($list) > 0)                                              
                @foreach($list as $item) 
                
                
                <div class="col">     
                    <div class="card crd">
                    <a href="{{ route('project.showork',$item->id_project) }}" style="text-decoration: none;"
                    data-bs-toggle="popover" data-bs-trigger="hover focus" title="Entrar">

                        @if($item->photo)
                            <img src="{{ asset('storage/'.$item->photo)}}" class="card-img-top" alt="...">
                        @else
                            <img src="{{asset('/images/general/card.png')}}" class="card-img-top" alt="...">
                        @endif
                        
                    </a> 
                        <div class="card-body card-color">
                        <h5 class="card-title text-center">{{ $item->title }}</h5>
                        <p class="card-text text-center"><strong>{{ $item->list1 }} | {{ $item->list2 }}</strong></p>
                        
                            <p class="text-card text-center">
                                <a href="{{ route('totrash',[$item->id_project, 2]) }}" class="btn btn-warning"
                                data-bs-toggle="popover" data-bs-trigger="hover focus" title="Papelera">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                                </a>                                 
                                <a href="{{ route('toCompleted',$item->id_project) }}" class="btn btn-success"
                                data-bs-toggle="popover" data-bs-trigger="hover focus" title="Completar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                                </a> 
                            </p>
                        
                        </div>                    
                        <div class="card-footer">
                        <small class="text-muted">                            
                            Fecha Creación: {{\Carbon\Carbon::parse($item->date_end)->format('d/m/Y')}}
                        </small>                        
                        </div>
                    </div> 
                </div>                                 
                @endforeach
            @else
                <a class="text-center" href="/home">No tienes pendientes. Primero debes de crear un proyecto.</a>
            @endif 
            <div class="text-center justify-content-center">
            {{ $list->links() }} 
            </div>          
        </div>
    </div>     
    
@endsection