
@extends('master')

@section('content')

   <div class="container">
        
        <form class="py-5" action="{{route('import')}}" enctype="multipart/form-data" method="POST">

            @csrf

            <div class="col-lg-12 py-5">
                <label for="file">Загрузка файла продуктов</label>
                <input type="file" class="form-control" style="padding: 3px" name="file" required />
            </div>

            <button type="submit" class="btn btn-success" name="upload">Import</button>

        </form>

    </div>

@endsection






