@extends('./layouts/app')
@section('title', 'Liste etudiant')
@section('content')
    <div class="container">
        <h1>Listes des etudiants B3 ASI</h1>
        <a type="button" class="btn btn-primary" href="{{route('student.create')}}">Ajouter</a>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Pictures</th>
                <th scope="col">Noms</th>
                <th scope="col">Prenoms</th>
                <th scope="col">Sexe</th>
                <th scope="col">Plus</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
              <tr>
                  <th>{{$student->id}}</th>
                  <td><img src="{{$student->picture}}" style="width: 50px"/></td>
                  <td>{{$student->first_name}}</td>
                  <td>{{$student->last_name}}</td>
                  <td>{{$student->gender}}</td>
                  <td><a href="{{route('student', ['id' => $student->id])}}">voir</a></td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          {{$students->links() }}
    </div>
@endsection
