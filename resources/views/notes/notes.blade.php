@extends('./layouts/app')
@section('title', 'Students Notes')
@section('content')
    <div class="container">
        <h1>Notes de {{$course->name}}</h1>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Noms et prenoms</th>
                <th scope="col">Notes</th>
                <th scope="col">Mention</th>
                <th scope="col">More</th>

              </tr>
            </thead>
            <tbody>
              
              @foreach ($students as $student)
                @foreach ($levelStudents as $levelStudent)
                  @if ($student->id == $levelStudent->student_id)
                    <tr>
                      <th>{{$student->first_name}} {{$student->last_name}}</th>
                      @if($notesLength==0)
                        <td>_</td>
                        <td>_</td>
                        <td><a href="{{route('note.create', ['level_id'=>$levelStudent->level_id,'student_id' => $student->id,'course_id' => $course->id])}}">add</a></td>
                      @else
                        @foreach ($notes as $note)
                          @if ($student->id == $note->student_id)
                            <td>{{$note->note }} </td>
                            <td>{{$note->type}} </td>
                            <td><a href="{{route('note.edit', ['level_id'=>$levelStudent->level_id,'student_id' => $student->id,'course_id' => $course->id,'id'=>$note->id])}}">voir</a></td>
                            @break
                          @else
                            @continue
                          @endif

                        @endforeach
                      @endif
                      <td><a href="{{route('note.create', ['level_id'=>$levelStudent->level_id,'student_id' => $student->id,'course_id' => $course->id])}}">add</a></td>
                      
                      </tr>
                    @else
                      @continue
                    @endif
                  @endforeach
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
