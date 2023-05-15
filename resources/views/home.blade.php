@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    @if(auth()->user()->is_admin == 1)
                    @include('students')
                    <a href="{{url('admin/routes')}}">Admin</a>
                    @else
                    <center><a class="btn btn-info" href="{{route('student.note',['id'=>auth()->user()->id])}}">See Your notes</a></center>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
