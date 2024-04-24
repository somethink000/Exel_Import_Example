
@extends('master')

@section('content')


    


    <div class="jumbotron text-center">
        <h1>Каталог продуктов</h1>
        <a href="{{route('upload_import')}}">Импорт>></a> 
    </div>


    <div class="container">
        <div class="row"> 
            @foreach ($products as $item)
        

                {{-- <a class="col-sm-4 bg-active" href="{{route('product.show', $item)}}">
                    <img src="http://catalog.collant.ru/pics/SNL-504038_m.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236"> 
                    <h5>{{$item->name}}</h5>
                    <p>{{$item->price}}.руб</p>
                </a>
 --}}

                <div class="col-md-4">
                    <div class="thumbnail">
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






