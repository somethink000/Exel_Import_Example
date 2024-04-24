
@extends('master')

@section('content')

    <div class="col-md-4">
        <div class="thumbnail">
            @foreach ($product->images as $item)
                <img src={{$item->image}} alt="Nature" style="width:100%">
            @endforeach
            
            <div class="caption">
                <h5>{{$product->name}}</h5>
                <p>{{$product->price}}.руб</p>
            </div>
        </div>
    </div>

@endsection






