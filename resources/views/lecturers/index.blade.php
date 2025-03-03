@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("lecturers.create") }}" class="btn btn-success">Add new lecturer</a>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Courses</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                    <tbody>
                        @foreach($lecturers as $lecturer)
                            <tr>
                                <td>{{$lecturer->name}}</td>
                                <td>{{$lecturer->surname}}</td>
                                <td>
                                    @foreach($lecturer->courses as $course)
                                        {{$course->title}} <br>
                                    @endforeach

                                </td>

                                <td>
                                    <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-primary">Edit</a>


                                </td>
                                <td>
                                    <form action="{{ route('lecturers.destroy', $lecturer->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button href="" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
