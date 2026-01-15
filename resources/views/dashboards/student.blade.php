@extends('layouts.student')
@section('content')
            <h1>Hello {{session('user_name')}}({{session('user_id')}})</h1>
@endsection
