@extends('trangphu')
@section('content') 
	@foreach($data as $d)
		{{$d->name}}</br>
		{{$d->phone}}</br>
		{{$d->no}}</br>
		{{$d->email}}</br>
	@endforeach
@endsection