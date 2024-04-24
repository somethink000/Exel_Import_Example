
@extends('master')

@section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Exel Import Example</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                   
                    <li class="nav-item"><a class="nav-link" href="#!">Import</a></li>
                    
                </ul>

            </div>
        </div>
    </nav>
    

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                
                @foreach ($products as $item)
                    <div class="col mb-5">
                        <div class="card h-100">
                            
                            <a href="{{route('product.show', $item)}}" target="_blank">
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
    <!-- Footer-->
    <footer class="py-2 bg-dark">
        
    {{-- </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script> --}}
</body>


@endsection






