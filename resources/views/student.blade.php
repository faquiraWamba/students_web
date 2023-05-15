@extends('./layouts/app')
@section('title', "Detail etudiant ".$student->last_name)
@section('content')
<div class="container">
    <h1>Informations Etudiant No {{$student->id}}</h1>
        
            <div class="card">
                <div class="card-body">
                  <img class="card-img-top" src="{{$student->picture}}" alt="a student" style="width: 70px" >
                  <h5 class="card-title">{{$student->last_name}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$student->first_name}}</h6>
                  <p class="card-text">{{$student->gender}}</p>
                  {{-- <p class="card-text">{{$student->age}}</p>
                  <p class="card-text">{{$student->is_asi?"ASI":"AUTRE"}}</p> --}}
                  <a href="{{route('student.edit', ['id' => $student->id])}}" class="card-link">Editer</a>
                  <a href="{{route('student.create')}}" class="card-link">Ajouter</a>
                </div>
              </div>
</div>
@endsection
    
