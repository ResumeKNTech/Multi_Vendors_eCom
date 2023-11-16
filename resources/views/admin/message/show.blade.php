@extends('layouts.app')
@section('module','Xem')
@section('action','Chi Tiết')
@section('content')
    <div class="card">
        <h5 class="card-header">Message</h5>
        <div class="card-body">
            @if ($message)
                @if ($message->user_image)
                    <img src="{{ $message->user_image }}" class="rounded-circle " style="margin-left:44%;">
                @else
                    <img src="{{ asset('backend/img/avatar.png') }}" class="rounded-circle " style="margin-left:44%;">
                @endif
                <div class="py-4">From: <br>
                    Name :{{ $message->name }}<br>
                    Email :{{ $message->email }}<br>
                    Phone :{{ $message->phone }}
                </div>
                <hr />
                <h5 class="text-center" style="text-decoration:underline"><strong>Subject :</strong> {{ $message->subject }}
                </h5>
                <p class="py-5"> {{ $message->message }}</p>
            @endif

        </div>
    </div>
@endsection
