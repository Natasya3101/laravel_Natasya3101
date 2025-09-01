@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-4">
    <h3>Login</h3>
    <form method="POST" action="{{ url('login') }}">
      @csrf
      <div class="mb-3">
        <label>Username</label>
        <input name="username" 
               class="form-control" 
               value="{{ old('username') }}" 
               autocomplete="username">
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input name="password" 
               type="password" 
               class="form-control" 
               autocomplete="current-password">
      </div>
      <button class="btn btn-primary">Login</button>
    </form>
  </div>
</div>
@endsection
