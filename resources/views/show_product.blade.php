
@extends('master')

@section('content')

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">

            <div class="row gx-4 gx-lg-5 align-items-center">
                



                <div id="carouselExample" class="carousel slide col-md-6">
                    <div class="carousel-inner">

                        @foreach ($product->images as $k => $item)

                            @if ($k == 0)
                                <div class="carousel-item active">
                            @else
                                <div class="carousel-item">
                            @endif

                                <img src={{$item->image}} class="d-block w-100" alt="...">
                            </div>

                        @endforeach 
                      
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>


                
               
                <div class="col-md-6">
            
                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                    <div class="fs-5 mb-5">
                        <span>{{$product->price}} руб</span>
                    </div>
                    <p class="lead">{{$product->description}}</p>
                    
                </div>
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

            <h3 class="pt-5">Характеристики товара:</h3>
            <table class="table">
                <tbody>
                    @foreach ($specifications as $k => $item)
                        <tr>
                            <td>{{$k}}</td>
                            <td>{{$item}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            


        </div>
    </section>


    
    


@endsection






