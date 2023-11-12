@extends('client.layouts.app')
@section('content')
@foreach ($categories as $i)

<h1>{{ $i->sub_category_name }}</h1>
@endforeach

@endsection
