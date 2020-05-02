@extends('layout')

@section('status')
<div class="card-wraper">

  @foreach ($status as $st)
    <div class="status-card">
      <div class="card-image">
        <img src="{{ $avater }}" alt="">
      </div>
      <div class="status-content">
        <p class="name">{{ $name }}</p>
        <p class="date">{{ date('H:i A, dS M Y', strtotime($st->created_at)) }}</p>
        <p>{{ $st->status }}</p>
      </div>
    </div>
  @endforeach
  
</div>
@endsection

@section('friendButton')
<div class="add-friend-button">
  @if ($displayaction)
  <a href="{{ route('shout.makefriend', $friendID) }}">Make Friend</a>
  <a href="{{ route('shout.unfriend', $friendID) }}">Unfriend</a>
  @endif
</div>
@endsection