@extends('./layouts/app')
@section('title', "courses ")
@section('content')
<div class="container">
  @if (isset($course))

  <form class="col-6" method="post" action="{{ route('course.edit', ['id' =>  $course->id]) }}" enctype="multipart/form-data">

  @method('PUT')

  @else

  <form action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">

  @endif
        @csrf
        <h1>@if (isset($course)) Edit @else Add @endif course</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" placeholder="course name" type="text" name="name" id="name" value="{{old('name', $course->name ?? '')}}">
            @error('name')
            <div class="text-danger">
              {{$message}}
            </div>
             @enderror
          </div>
          <div class="form-group">
            <label for="code">Code</label>
            <input class="form-control" placeholder="course code" type="text" name="code" id="code" value="{{old('code', $course->code ?? '')}}">
            @error('code')
            <div class="text-danger">
              {{$message}}
            </div>
             @enderror
          </div>
          <div class="form-group">
            <label for="description">description</label>
            <textarea class="form-control" id="description" name="description" rows="3" value="{{ old('description', $course->description ?? '')}}"></textarea>
              @error('description')
              <div class="text-danger">
                  {{$message}}
              </div>
              @enderror
          </div>
        <div class="form-group">
          <label for="semester">semester</label>
          <select class="form-select" aria-label="Default select example" name="semester" value="{{old('semester',$course->semester ?? '')}}">
            <option >Choose the semester</option>
             <option value="1" >1</option>  
            <option value="2" >2</option>
          </select>
          @error('semester')
          <div class="text-danger">
            {{$message}}
          </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="level_id">level</label>
            <select class="form-select" aria-label="Default select example" name="level_id" value="{{old("level_id")}}">
              <option >Choose the level</option>
              @foreach ($levels as $level)
               <option value={{$level->id}} >{{$level->name}} {{$level->speciality}}</option>  
              @endforeach
              </select>
            {{-- {{-- @error('level')
            <div class="text-danger">
              {{$message}}
            </div>
          @enderror  --}}
          </div>
       
       
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
    
