
@extends('master')

@section('content')

    <div class="col-md-4">
        <div class="thumbnail">
            <img src="http://catalog.collant.ru/pics/SNL-504038_m.jpg" alt="Nature" style="width:100%">
            <div class="caption">
                <h5>{{$product->name}}</h5>
                <p>{{$product->price}}.руб</p>
            </div>
        </div>
    </div>

@endsection






