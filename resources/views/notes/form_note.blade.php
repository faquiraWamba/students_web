@extends('./layouts/app')
@section('title', "notes ")
@section('content')
<div class="container">
  @if (isset($note))

  <form class="col-6" method="post" action="{{ route('note.edit', ['level_id'=>$level_id, 'student_id'=>$student_id,'course_id'=>$course_id,'id' =>  $note->id]) }}" enctype="multipart/form-data">

  @method('PUT')

  @else

  <form action="{{route('note.store',['level_id'=>$level_id,'student_id'=>$student_id,'course_id'=>$course_id])}}" method="POST" enctype="multipart/form-data">

  @endif
        @csrf
        <h1>@if (isset($note)) Edit @else Add @endif Note</h1>
        <div class="form-group">
          <label for="note">note</label>
          <input type="number" class="form-control w-25 mb-sm-3" id="note" placeholder="note" name="note" value="{{old('note',$note->note ?? '')}}">
          @error('note')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
    