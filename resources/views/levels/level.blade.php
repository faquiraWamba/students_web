@extends('./layouts/app')
@section('title', "Detail salle ".$level->name)
@section('content')
<div class="container">
    <h1>Informations Salle No {{$level->id}}</h1>
        
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$level->name}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$level->speciality==''?"other":$level->speciality}}</h6>
                  <p class="card-text">{{$level->description}}</p>
                  <a class="card-text" href="{{route('level.courses', ['id' => $level->id])}}">cour(s) suivi(s)</a>
                   <form  action="{{route('level.destroy', ['id' => $level->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                      <div class="d-flex  justify-content-between w-25">
                        <div>
                          <a class="btn btn-secondary" href="{{route('level.edit', ['id' => $level->id])}}" class="card-link">Editer</a>
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
    