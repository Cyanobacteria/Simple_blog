
@extends('layouts.front')
@section('content')


@foreach($article as $at)


{{$at->title}}
<br>


@endforeach


@endsection
