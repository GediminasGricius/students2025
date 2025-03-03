@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("courses.create") }}" class="btn btn-success">Add new course</a>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <th>Lecturer</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$course->title}}</td>
                                <td>
                                    @if ($course->lecturer!=null)
                                        {{ $course->lecturer->name }}  {{ $course->lecturer->surname }}
                                    @else
                                        undefined
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>


                                </td>
                                <td>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="post">
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
