@extends('layouts')
@include('nav')
@section('content')
        <a href="/teachers" class="btn btn-sm btn-warning">Add Teacher</a>
    
            
        <table class="table table-condensed table-striped table-bordered table-hover">
        
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Created at</th>
                <th colspan="3">Actions</th>
            </tr>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id}}</td>
                    <td>{{ $teacher->firstName}}</td>   
                    <td>{{ $teacher->lastName}}</td>
                    <td>{{ $teacher->email}}</td>
                    <td>{{ $teacher->name}}</td>
                    <td>{{ $teacher->created_at->toFormattedDateString()}}</td>
                
                    <td><a href="/teachers/edit/{{ $teacher->id}}" class="btn btn-sm btn-primary">Edit</a></td>
                    <td><a href="/teachers/delete/{{ $teacher->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>     
                </tr>
                
            @endforeach
        </table>
@endsection