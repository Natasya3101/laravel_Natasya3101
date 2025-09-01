@extends('layouts.app')
@section('content')
<h4>Edit Hospital</h4>
<form method="POST" action="{{ route('hospitals.update',$hospital) }}">
  @csrf @method('PUT')
  <div class="mb-3"><label>Name</label><input name="name" value="{{ $hospital->name }}" class="form-control"></div>
  <div class="mb-3"><label>Address</label><textarea name="address" class="form-control">{{ $hospital->address }}</textarea></div>
  <div class="mb-3"><label>Email</label><input name="email" value="{{ $hospital->email }}" class="form-control"></div>
  <div class="mb-3"><label>Phone</label><input name="phone" value="{{ $hospital->phone }}" class="form-control"></div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
