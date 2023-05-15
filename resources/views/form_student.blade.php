@extends('./layouts/app')
@section('title', "Ajouter un nouvel etudiant ")
@section('content')
<div class="container">
  @if (isset($student))

  <form class="col-6" method="post" action="{{ route('student.edit', ['id' =>  $student->id]) }}" enctype="multipart/form-data">

  @method('PUT')

  @else

  <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="user_id">user id</label>
      <select class="form-select" aria-label="Default select example" name="user_id" value="{{old("user_id")}}">
        <option >Choose user id</option>
        @foreach ($users as $user)
         <option value={{$user->id}} >{{$user->id}}</option>  
        @endforeach
        </select>
      @error('user_id')
        <div class="text-danger">
          {{$message}}
        </div>
      @enderror
    </div>
  @endif
        @csrf
        <h1>@if (isset($student)) Edit @else Add @endif Student</h1>
        
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" class="form-control" id="last_name" placeholder="last name" name="last_name" value="{{ old('last_name', $student->last_name ?? '')}}">
          @error('last_name')
          <div class="text-danger">
            {{$message}}
          </div>
        @enderror
        </div>
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" class="form-control" id="first_name" placeholder="first name" name="first_name" value="{{ old('first_name', $student->first_name ?? '')}}" >
          @error('first_name')
          <div class="text-danger">
            {{$message}}
          </div>
        @enderror
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-select" aria-label="Default select example" name="gender" value="{{old('gender'=='M'?'Homme': 'Femme')}}">
            <option >Cliquer ici pour choisir le sexe</option>
             <option value="M" >Homme</option>  
            <option value="F">Femme</option>
          </select>
          @error('gender')
          <div class="text-danger">
            {{$message}}
          </div>
        @enderror
        </div>
          <div class="form-group">
            <label for="level_id">level</label>
            <select class="form-select" aria-label="Default select example" name="level_id" value="{{old("level_id")}}">
              <option >Choose your level</option>
              @foreach ($levels as $level)
               <option value={{$level->id}} >{{$level->name}} {{$level->speciality}}</option>  
              @endforeach
              </select>
            {{-- @error('level')
            <div class="text-danger">
              {{$message}}
            </div>
          @enderror  --}}
          </div>

        <div class="form-goup">
          <label for="picture" class="form-label">Image</label>
          <input class="form-control form-control-sm" id="picture" type="file" name="picture" value="{{ old('picture', $student->picture ?? '')}}">
          @error('picture')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="school_year">School year</label>
          <input type="number" class="form-control" id="school_year" placeholder="school year" name="school_year" value="{{old('school_year',$levelsStudent->school_year ?? '')}}">
          @error('school_year')
            <div class="text-danger">
              {{$message}}
            </div>
          @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
    
