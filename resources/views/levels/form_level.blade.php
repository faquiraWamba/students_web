@extends('./layouts/app')
@section('title', "Levels ")
@section('content')
<div class="container">
  @if (isset($level))

  <form class="col-6" method="post" action="{{ route('level.edit', ['id' =>  $level->id]) }}" enctype="multipart/form-data">

  @method('PUT')

  @else

  <form action="{{route('level.store')}}" method="POST" enctype="multipart/form-data">

  @endif
        @csrf
        <h1>@if (isset($level)) Edit @else Add @endif Level</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <select class="form-select" aria-label="Default select example" name="name" value="{{old('name',$level->name ?? '')}}">
              {{-- <option >Cliquer ici pour choisir le sexe</option> --}}
               <option value="B1">B1</option>  
                <option value="B2">B2</option>
                <option value="B3">B3</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
            </select>
            @error('name')
            <div class="text-danger">
              {{$message}}
            </div>
             @enderror
          </div>
        <div class="form-group">
          <label for="speciality">speciality</label>
          <select class="form-select"  name='speciality' >
            <option value="IABD" >IABD</option>
             <option value="ASI" >ASI</option>  
            <option value="RSI">RSI</option>
          </select>
          {{-- @error('name')
          <div class="text-danger">
            {{$message}}
          </div>
            @enderror --}}
        </div>
        <div class="form-group">
          <label for="description">description</label>
          <textarea class="form-control" id="description" name="description" rows="3" value="{{ old('description', $level->description ?? '')}}"></textarea>
            @error('last_name')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
    
