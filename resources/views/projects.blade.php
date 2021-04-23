@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Projects</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            @if(count($projects) > 0)
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Completed</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td><div>{{$project->id}}</div></td>
                            <td><div>{{$project->name}}</div></td>
                            <td><div>{{$project->description}}</div></td>
                            <td><div>{{$project->price}}</div></td>
                            <td><div>{{$project->completed}}</div></td>
                            <td><div>{{$project->start}}</div></td>
                            <td><div>{{$project->end}}</div></td>
                            <td><a class="link" href="{{ route('editproject', $project->id) }}">Edit</a></td>

                            @if($project->leader == Auth::user()->getId())
                            <td><a class="link" href="{{ route('users', $project->id) }}">Add user</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                No projects.
            @endif
        </div>
    </body>
</html>
@endsection
