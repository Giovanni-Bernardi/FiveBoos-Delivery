@extends('layouts.main-layout')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<main>
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <form method="POST"
                        action="{{ route('storeRestaurant') }}"
                        enctype="multipart/form-data">
    
                    @csrf
                    @method('POST')
                    
                     <div class="form-group row">
                        <label for="business_name" class="col-md-4 col-form-label text-md-right">NOME RISTORANTE</label>
                        <div class="col-md-6">
                            <input id="business_name" type="text" class="form-control" name="business_name" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="piva" class="col-md-4 col-form-label text-md-right">P. IVA</label>
                        <div class="col-md-6">
                            <input id="piva" type="number" class="form-control" name="piva" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">INDIRIZZO</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">DESCRIZIONE</label>
                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control" name="description" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telephone" class="col-md-4 col-form-label text-md-right">TELEFONO</label>
                        <div class="col-md-6">
                            <input id="telephone" type="text" class="form-control" name="telephone" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="img" class="col-md-4 col-form-label text-md-right">IMG</label>
                        <div class="col-md-6">
                            <input id="img" type="file" class="form-control" name="img" value="">
                        </div>
                    </div> 
                    <div>
                        Catrogies:
                    </div>
                    <div class="form-group row">
                        <div class="col-12 text-center">
                            @foreach ($categories as $category)
                                <label for="categories[]">
                                    {{$category -> name}}
                                </label>
                                <input type="checkbox" name="category_id[]" id="" value="{{$category -> id}}">
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 text-center">
                             <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

 @endsection