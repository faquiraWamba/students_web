@extends('./layouts/app')
@section('title', 'Liste etudiant')
@section('content')
    <div class="container">
        <h1>Listes des cours de {{$level->name}} {{$level->speciality}}</h1>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Nom</th>
                <th scope="col">description</th>
                <th scope="col">semester</th>
                <th scope="col">More</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($courses as $course)
              <tr>
                  <td>{{$course->code}}</td>
                  <td>{{$course->name}}</td>
                  <td>{{$course->description}}</td>
                  <td>{{$course->semester}}</td>
                  <td><a href="{{route('notes', ['level_id' => $level->id,'course_id' => $course->id])}}">Notes</a></td>
                  </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
