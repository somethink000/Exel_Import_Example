
@extends('master')

@section('content')

   <div class="container">
        
        <form action="{{route('import')}}" enctype="multipart/form-data" method="POST">

            @csrf

            <div class="col-lg-12 py-5">
                <label for="products">Загрузка файла продуктов</label>
                <input type="file" class="form-control" style="padding: 3px" name="products" required />
            </div>

            <button type="submit" class="btn btn-success" name="upload">Import</button>

        </form>

    </div>

@endsection






