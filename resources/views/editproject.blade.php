@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit project</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="justify-content-center">
                <div class="card">
                    <div class="card-header">Edit project <b style="float: right; font-weight: bold">{{$project->name}}</b></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('saveproject', $project->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        @if($project->leader == Auth::user()->getId())
                            <div class="form-group row">
                                <label for="name">Name: </label>
                                <input class="form-control" type="text" name="name" id="name" value="{{$project->name}}" required />
                            </div>
                            <div class="form-group row">
                                <label for="description">Description: </label>
                                <input class="form-control" rows=5 name="description" id="description" value="{{$project->description}}" required />
                            </div>
                            <div class="form-group row">
                                <label for="price">Price: </label>
                                <input class="form-control" type="text" name="price" id="price" value="{{$project->price}}" required />
                            </div>
                            <div class="form-group row">

                        @endif
                                <label for="completed">Completed: </label>
                                <textarea class="form-control" rows=5 name="completed" id="completed" required>{{$project->completed}}</textarea>
                            </div>

                        @if($project->leader == Auth::user()->getId())
                            <div class="form-group row">
                                <label for="start">Start date: </label>
                                <input class="form-control" type="text" name="start" id="start" value="{{$project->start}}" required />
                            </div>
                            <div class="form-group row">
                                <label for="end">End date: </label>
                                <input class="form-control" type="text" name="end" id="end" value="{{$project->end}}" required />
                            </div>
                        @endif

                            <div class="form-group row mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
