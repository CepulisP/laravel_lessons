@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Send message') }}</div>
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('inbox.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="recipient" class="form-control" placeholder="Enter nickname">
                                <textarea name="content" class="form-control"></textarea>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="submit" value="Send" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
