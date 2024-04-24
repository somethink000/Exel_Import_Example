
@extends('master')

@section('content')

    

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                
                @foreach ($products as $item)
                    <div class="col mb-5">
                        <div class="card h-100">
                            
                            <a href={{route('product.show', $item)}} target="_blank">
                                <img class="card-img-top" src={{$item->images[0]->image}} alt="..." />
                            </a>

                            <div class="card-body p-4">
                                <div class="text-center">
                                  
                                    <h5 class="fw-bolder">{{$item->name}}</h5>
                                        {{$item->price}} руб
                                </div>
                            </div>
                            
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
  
    
   
</body>


@endsection






