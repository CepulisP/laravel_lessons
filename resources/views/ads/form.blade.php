@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create an ad') }}</div>
                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('ad.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Title">
                                <textarea name="content" class="form-control"></textarea>
                                <input type="text" name="image" class="form-control" placeholder="Image">
                                <input type="text" name="years" class="form-control" placeholder="Year">
                                <input type="text" name="vin" class="form-control" placeholder="VIN">
                                <input type="text" name="price" class="form-control" placeholder="Price">
                                <select name="color_id" class="form-control">
                                    <option selected>Select a color</option>
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                                <select name="type_id" class="form-control">
                                    <option selected>Select type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                <select name="manufacturer_id" class="form-control">
                                    <option selected>Select manufacturer</option>
                                    @foreach($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                    @endforeach
                                </select>
                                <select name="model_id" class="form-control">
                                    <option selected>Select model</option>
                                    @foreach($carModels as $model)
                                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="submit" value="Create" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
