@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("students.create") }}" class="btn btn-success">{{ __('Add new student') }}</a>
                <table class="table">
                    <tbody>
                        <tr>
                            <th></th>
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
                                <td>
                                    @if ($student->photo !== null)
                                        <img src="/storage/{{ $student->photo }}" alt="" style="width: 100px">
                                    @endif
                                </td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->surname}}</td>
                                <td>{{$student->email}}</td>

                                <td>{{$student->phone}}</td>
                                <td>
                                    @can('editStudent', $student)
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">
                                           {{ __("Edit") }}
                                        </a>
                                    @endcan


                                </td>
                                <td>

                                    @can('deleteStudent', $student)
                                        <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button href="" class="btn btn-danger">{{ __("Delete") }}</button>
                                        </form>
                                    @endcan

                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
