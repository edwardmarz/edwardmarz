@extends('admin.layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin's Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Welcome Admin : <strong>{{ Auth::user()->name}}</strong></p>
                        <p>Your joined  : {{ Auth::user()->created_at->diffForHumans() }} </p>
                        
                        <a href="{{ route('lecture.register') }}">Lecture</a>
                        &nbsp
                        |
                        &nbsp
                        <a href="{{ route('register') }}">Student</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
