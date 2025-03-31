@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>
                                {{ $error }}
                            </div>

                        @endforeach
                    </div>

                @endif
               <form method="post" action="{{ route("students.update", $student) }}">
                   @csrf
                   @method('PUT')
                   <div class="mb-3">
                       <label class="form-label">Name:</label>
                       <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                   </div>
                   <div class="mb-3">
                       <label class="form-label">Surname:</label>
                       <input type="text" class="form-control" name="surname" value="{{ $student->surname }}">
                   </div>
                   <div class="mb-3">
                       <label class="form-label">Email:</label>
                       <input type="email" class="form-control" name="email" value="{{ $student->email }}">
                   </div>
                   <div class="mb-3">
                       <label class="form-label">Phone:</label>
                       <input type="text" class="form-control" name="phone" value="{{ $student->phone }}">
                   </div>
                   <button type="submit" class="btn btn-success">Update</button>

               </form>
            </div>
        </div>
    </div>
@endsection
