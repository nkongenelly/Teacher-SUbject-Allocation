@extends('layouts')
@section('content')
    <a href="/allteachers" class="btn btn-sm btn-warning">View Teachers</a>
        <form class="form-horizontal" action="/allteachers/update/{{$teacher->id}}" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
        <div class="form-group">
            <label for="title">First Name</label>
            <input type="text" class="form-control" name="firstName" value={{$teacher->firstName}} required>
            
        </div>
        <div class="form-group">
            <label for="title">Last Name</label>
            <input type="text" class="form-control" name="lastName" value={{$teacher->lastName}} required>
            
        </div>
        <div class="form-group">
            <label for="title">Email</label>
            <input type="email" class="form-control" name="email" value={{$teacher->email}} required>
            
        </div>
        <div class="form-group">
        <label for="title">Choose Category</label>
            <select name="subjectid">
            <option value="{{$teacher->subjectid}}">{{$teacher->name}}</option>
            @foreach($subjects as $subject)
                <option value="{{$subject->subjectid}}">
                    {{$subject->name}}
                </option>
                @endforeach
            </select>
            
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection