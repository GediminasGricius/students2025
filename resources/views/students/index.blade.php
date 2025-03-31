@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("students.create") }}" class="btn btn-success">{{ __('Add new student') }}</a>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>{{ __("Name") }}</th>
                            <th>{{ __("Surname") }}</th>
                            <th>{{ __("Email") }}</th>
                            <th>{{ __("Phone") }}</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->surname}}</td>
                                <td>{{$student->email}}</td>

                                <td>{{$student->phone}}</td>
                                <td>
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">
                                       {{ __("Edit") }}
                                    </a>


                                </td>
                                <td>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button href="" class="btn btn-danger">{{ __("Delete") }}</button>
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
