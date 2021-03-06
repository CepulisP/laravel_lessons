@extends('layouts.app')

@section('content')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit your ad') }}</div>
                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('ad.update', $ad->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" value="{{ $ad->title }}">
                                <textarea name="content" class="form-control">{{ $ad->content }}</textarea>
                                <input type="text" name="image" class="form-control" value="{{ $ad->image }}">
                                <input type="text" name="years" class="form-control" value="{{ $ad->years }}">
                                <input type="text" name="vin" class="form-control" value="{{ $ad->vin }}">
                                <input type="text" name="price" class="form-control" value="{{ $ad->price }}">
                                <select name="color_id" class="form-control">
                                    @foreach($colors as $color)
                                        <option
                                            @if ($ad->color_id == $color->id)
                                                selected
                                            @endif
                                            value="{{ $color->id }}">{{ $color->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <select name="type_id" class="form-control">
                                    @foreach($types as $type)
                                        <option
                                            @if ($ad->type_id == $type->id)
                                            selected
                                            @endif
                                            value="{{ $type->id }}">{{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <select name="manufacturer_id" id="sel_manufacs" class="form-control">
                                    @foreach($manufacturers as $manufacturer)
                                        <option
                                            @if ($ad->manufacturer_id == $manufacturer->id)
                                            selected
                                            @endif
                                            value="{{ $manufacturer->id }}">{{ $manufacturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <select name="model_id" id="sel_models" class="form-control">
                                    @foreach($carModels as $model)
                                        <option
                                            @if ($ad->model_id == $model->id)
                                            selected
                                            @endif
                                            value="{{ $model->id }}">{{ $model->name }}
                                        </option>
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
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                        <script>
                            $(document).ready(function(){

                                $("#sel_manufacs").change(function(){
                                    var manId = $(this).val();

                                    $.ajax({
                                        url: '{{ route('getmodels') }}',
                                        type: 'POST',
                                        data: {manufac:manId},
                                        dataType: 'json',
                                        success:function(response){

                                            var len = response.length;

                                            $("#sel_models").empty();
                                            for( var i = 0; i<len; i++){
                                                var id = response[i]['id'];
                                                var name = response[i]['name'];

                                                $("#sel_models").append("<option value='"+id+"'>"+name+"</option>");

                                            }
                                        }
                                    });
                                });

                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
