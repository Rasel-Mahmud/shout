@extends('layout')

@section('form')
<div class="row">
  <div class="col-md-8 offset-md-2">

    <form action="{{ route('shout.save') }}" method="POST" id="statusform">
      @csrf
      <textarea name="statusarea" class="form-control" id="statusarea"></textarea>
      <input type="submit" class="btn btn-primary" value="Post">
    </form>

  </div>
</div>
@endsection

@section('status')
<div class="card-wraper">

  @foreach ($status as $st)
    <div class="status-card">
      <div class="card-image">
        <img src="{{ $avater }}" alt="">
      </div>
      <div class="status-content">
        <p class="name">{{ $st->user->name }}</p>
        <p class="date">{{ date('H:i A, dS M Y', strtotime($st->created_at)) }}</p>
        <p>{{ $st->status }}</p>
      </div>
    </div>
  @endforeach
  
</div>
@endsection