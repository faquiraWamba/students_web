@extends('./layouts/app')
@section('title', "Detail course ".$course->code)
@section('content')
<div class="container">
    <h1>course No {{$course->id}}</h1>
    
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$course->name}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$course->code}}</h6>
                  <p class="card-text">{{$course->description}}</p>
                  
                  <form  action="{{route('course.destroy', ['id' => $course->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                  <div class="d-flex  justify-content-between w-25">
                    <div>
                      <a class="btn btn-secondary" href="{{route('course.edit', ['id' => $course->id])}}" class="card-link">Editer</a>
                    </div>
                    <div >
                      <button class="btn btn-danger " type="submit">Delete</button>
                    </div>
                  </div>
                </form>

                </div>
              </div>
              
</div>
@endsection
    