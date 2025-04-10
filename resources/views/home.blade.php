@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="post-title">Id and id your plants here:</h1>
            <p>
                <a href="{{ url('/identify') }}" class="btn btn-success">Launch Identifier</a>
                
            </p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="post-title">Plants Info Card</h1>
            <p>Info on plants displayed upon search</p>
            <p><a href="#">Link to read more?</a></p>
        </div>
    </div>
    <hr>
@endsection
