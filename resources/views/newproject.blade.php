@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New project</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="justify-content-center">
                <div class="card">
                    <div class="card-header">New project</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('project') }}">
                        @csrf
                            <div class="form-group row">
                                <label for="name">Name: </label>
                                <input class="form-control" type="text" name="name" id="name" required />
                            </div>
                            <div class="form-group row">
                                <label for="description">Description: </label>
                                <input class="form-control" name="description" id="description" required />
                            </div>
                            <div class="form-group row">
                                <label for="price">Price: </label>
                                <input class="form-control" type="number" name="price" id="price" required />
                            </div>
                            <div class="form-group row">
                                <label for="completed">Jobs done: </label>
                                <textarea class="form-control" name="completed" id="completed" required></textarea>
                            </div>
                            <div class="form-group row">
                                <label for="start">Start date: </label>
                                <input class="form-control" type="date" name="start" id="start" required />
                            </div>
                            <div class="form-group row">
                                <label for="end">End date: </label>
                                <input class="form-control" type="date" name="end" id="end" required />
                            </div>
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
