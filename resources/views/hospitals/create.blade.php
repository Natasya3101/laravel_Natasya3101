@extends('layouts.app')
@section('content')
<h4>Add Hospital</h4>
<form method="POST" action="{{ route('hospitals.store') }}">
  @csrf
  <div class="mb-3"><label>Name</label><input name="name" class="form-control"></div>
  <div class="mb-3"><label>Address</label><textarea name="address" class="form-control"></textarea></div>
  <div class="mb-3"><label>Email</label><input name="email" class="form-control"></div>
  <div class="mb-3"><label>Phone</label><input name="phone" class="form-control"></div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
