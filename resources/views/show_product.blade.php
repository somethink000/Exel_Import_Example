
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

            @php
                $fe = $product->feature;
                $specifications = [
                    'Размер' =>$fe->size,  
                    'Цвет' =>$fe->color,  
                    'Бренд' =>$fe->brand,  
                    'Состав' =>$fe->compound,  
                    'Кол-во в упаковке' =>$fe->count,  
                    'Ссылка на упаковку' =>$fe->package_link,  
                    'Ссылки на фото' =>$fe->image_link,  
                    'seo title' =>$fe->seo_title,  
                    'seo h1' =>$fe->seo_h1,  
                    'seo description' =>$fe->seo_description,  
                    'Вес товара(г)' =>$fe->weight,  
                    'Ширина(мм)' =>$fe->width,  
                    'Высота(мм)' =>$fe->height,  
                    'Длина(мм)' =>$fe->length,  
                    'Вес упаковки(г)' =>$fe->package_weight,  
                    'Ширина упаковки(мм)' =>$fe->package_width,  
                    'Высота упаковки(мм)' =>$fe->package_height,  
                    'Длина упаковки(мм)' =>$fe->package_length,  
                    'Категория товара' =>$fe->category,  
                ]
            @endphp
           
          
           @foreach ($specifications as $k => $item)
               <p>{{$k}} - {{$item}}</p>
           @endforeach

            
        </div>
    </div>

@endsection






