
@extends('master')

@section('content')

    <a class="pt-5" href="{{route('upload_import')}}">
        <button class="btn btn-success">Импорт>></button>
    </a> 

    <div class="p-5 text-center">
        <h1>Каталог продуктов</h1>
        
    </div>


    <div class="container">
        <div class="row"> 
            @foreach ($products as $item)

                <div class="col-md-4">
                    <div class="thumbnail" >
                        <a href="{{route('product.show', $item)}}" target="_blank">
                        <img src="http://catalog.collant.ru/pics/SNL-504038_m.jpg" alt="Nature" style="width:100%">
                        <div class="caption">
                            <h5>{{$item->name}}</h5>
                            <p>{{$item->price}}.руб</p>
                        </div>
                        </a>
                    </div>
                </div>
            
            @endforeach
        </div>
    </div>    

@endsection






