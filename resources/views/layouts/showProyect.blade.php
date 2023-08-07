@extends('layouts.app')

@section('content')


@foreach($obj as $project)

    <div class="container cont-show">
        <div class="viewProject">
            <div>
                <h1 class="h1 text-center fontitle">{{ $project->title }}</h1>
            </div>
            <div class="row text-center h2 fontitle py-4 sticky-top shadow-sm">
                <span class="col-6">{{ $project->list1 }}</span>
                <span class="col-6">{{ $project->list2 }}</span>
            </div>
            <div class="row">
                <div class="col-6 one py-4">
                    <ul>
                        @foreach($act as $action)
                        @if($action->id_type == 1)
                        <li><strong> {{$action->name}} </strong></li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-6 two py-4">
                    <ul>
                        @foreach($act as $action)
                        @if($action->id_type == 2)
                        <li><strong> {{$action->name}} </strong></li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>                
    </div>

@endforeach

@endsection