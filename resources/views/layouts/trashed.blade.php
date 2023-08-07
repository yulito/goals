@extends('layouts.app')

@section('content')

    <h4 class="h4 text-center">
        <form action="{{ url('/delete/'.$list) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-link">Vaciar Papelera</button>
        </form>
    </h4>
    <br><hr><br>
    <div class="listgoals row justify-content-center">
        <hr>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Fecha en papelera</th>
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
                        <td>{{ \Carbon\Carbon::parse($item->date_end)->format('d/m/Y') }}</td>
                        <td class="text-end">
                            <a href="{{ route('project.work',$item->id_project) }}" class="btn btn-success"
                            data-bs-toggle="popover" data-bs-trigger="hover focus" title="Restaurar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-arrow-up" viewBox="0 0 16 16">
                            <path d="M8 11a.5.5 0 0 0 .5-.5V6.707l1.146 1.147a.5.5 0 0 0 .708-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 6.707V10.5a.5.5 0 0 0 .5.5z"/>
                            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                            </svg>
                            </a>                            
                        </td>   
                        <td>                               
                            <form action="{{ route('deleteOne', $item->id_project) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                data-bs-toggle="popover" data-bs-trigger="hover focus" title="Eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                                <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                </svg>
                                </button> 
                            </form>                                                 
                        </td>                     
                    </tr>
                    
                    @endforeach
                    @endif
                    <!------------------------------------------------------------------->
                </tbody>
            </table>
        </div>
@endsection

