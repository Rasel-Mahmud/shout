@extends('layout')

@section('body')
  <form action="{{ route('profile.save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <p>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
    </p>
    <p>
      <label for="name">Email</label>
      <input type="email" name="email" id="name" class="form-control" value="{{ Auth::user()->email }}">
    </p>
    <p>
      <label for="name">Nickname</label>
      <input type="text" name="nickname" id="name" class="form-control" value="{{ Auth::user()->nickname }}">
    </p>
    <p>
      <label for="name">Profile Picture</label>
      <input type="file" name="image" id="image" class="form-control-file">
    </p>
    <p>
      <input type="submit" class="btn btn-primary" value="Submit">
    </p>
  </form>
@endsection