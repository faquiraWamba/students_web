@extends('./layouts/app')
@section('title', 'Liste Niveaux')
@section('content')
    <div class="container">
        <h1>Listes des Niveaux</h1>
        <a type="button" class="btn btn-primary" href="{{route('level.create')}}">Add</a>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">description</th>
                <th scope="col">speciality</th>
                <th scope="col">More</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($levels as $level)
              <tr>
                <th scope="row">{{$level->id}}</th>
                <td>{{$level->name}}</td>
                <td>{{$level->speciality}}</td>
                <td>{{$level->description}}</td>
                <td><a href="{{route('level', ['id' => $level->id])}}">more</a></td>
                
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
