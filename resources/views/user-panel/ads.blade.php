@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Views</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($ads as $ad)
                        <tr>
                            <th scope="row">{{ $ad->id }}</th>
                            <td>{{ $ad->title }}</td>
                            <td>{{ $ad->views }}</td>
                            <td><a href="{{ route('ad.edit', $ad->id) }}">Edit</a></td>
                            <form method="POST" action="{{ route('ad.destroy', $ad->id) }}">
                                @csrf
                                @method('DELETE')
                                <td><input type="submit" value="Delete"></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
