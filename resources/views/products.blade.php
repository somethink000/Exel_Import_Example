
@extends('master')

@section('content')


    <a href="{{route('upload_import')}}">Импорт</a>

    @foreach ($products as $item)
        <div>
           <h1>{{$item->name}}</h1>
            {{-- <img src="/storage/{{$item->image}}" width="84" alt=""> --}}
        </div>
    @endforeach


@endsection






