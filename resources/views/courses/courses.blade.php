@extends('./layouts/app')
@section('title', 'Liste etudiant')
@section('content')
    <div class="container">
        <h1>Listes des cours</h1>
        <a type="button" class="btn btn-primary" href="{{route('course.create')}}">Ajouter</a>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">N0</th>
                <th scope="col">Nom</th>
                <th scope="col">code</th>
                <th scope="col">description</th>
                <th scope="col">semester</th>
                <th scope="col">Level</th>
                <th scope="col">Plus</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($courses as $course)
              <tr>
                  <th>{{$course->id}}</th>
                  <td>{{$course->name}}</td>
                  <td>{{$course->code}}</td>
                  <td>{{$course->description}}</td>
                  <td>{{$course->semester}}</td>
                  <td>{{$course->level_id}}</td>
                  <td><a href="{{route('course', ['id' => $course->id])}}">voir</a></td>
                  </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
