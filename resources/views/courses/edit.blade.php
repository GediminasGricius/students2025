@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
               <form method="post" action="{{ route("courses.update", $course) }}">
                   @csrf
                   @method('PUT')
                   <div class="mb-3">
                       <label class="form-label">Title:</label>
                       <input type="text" class="form-control" name="title" value="{{ $course->title }}">
                   </div>
                   <div class="mb-3">
                       <label class="form-label">Lecturer ID:</label>
                       <select class="form-control" name="lecturer_id">
                           <option value="" selected>-</option>
                           @foreach($lecturers as $lecturer)
                               <option value="{{ $lecturer->id }}"  {{ ($course->lecturer_id==$lecturer->id)?'selected':'' }}  >{{ $lecturer->name }} {{ $lecturer->surname }}</option>
                           @endforeach

                       </select>

                   </div>
                   <button type="submit" class="btn btn-success">Update</button>

               </form>
            </div>
        </div>
    </div>
@endsection
