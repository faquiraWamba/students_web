@extends('./layouts/app')
@section('title', "Detail etudiant ".$student->last_name)
@section('content')
<div class="container">
    
    <div class="d-flex  justify-content-between">

        <h1>Bulletin de notes Etudiant No {{$student->id}}</h1>
        <a class="btn btn-success" href="{{route('generate.pdf',['id'=>$student->user_id])}}">Download pdf</a>
    </div>
        
            <div class="card">
                <div class="card-body">
                <div class="d-flex  justify-content-between">
                   
                <div>
                  
                  <h5 class="card-title">Last Name: {{$student->last_name}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">First Name: {{$student->first_name}}</h6>
                </div>
                <div>
                    {{-- <img class="card-img-top" src="{{$student->picture}}" alt="a student" style="width: 70px" > --}}
                    </div>
                    
                </div>
                  <p class="card-text">Sexe: {{$student->gender}}</p>
                  <p class="card-text">Classe: {{$level->name}} {{$level->speciality}}</p>

                </div>

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">code</th>
                        <th scope="col">course</th>
                        <th scope="col">Note</th>
                        <th scope="col">Mention</th>
        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($courses as $course)
                      <tr>
                          <th>{{$course->code}}</th>
                          <td>{{$course->name}}</td>
                          @foreach ($notes as $note)
                            @if($course->id==$note->course_id && $student->id==$note->student_id)
                                <td>{{$note->note}}</td>
                                <td>{{$note->type}}</td>
                                @break
                            @else
                                @continue
                            @endif
                            @endforeach
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
</div>
@endsection
    
