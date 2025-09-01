@extends('layouts.app')
@section('content')
<h4>Add Patient</h4>
<form method="POST" action="{{ route('patients.store') }}">
  @csrf
  <div class="mb-3"><label>Name</label><input name="name" class="form-control"></div>
  <div class="mb-3"><label>Address</label><textarea name="address" class="form-control"></textarea></div>
  <div class="mb-3"><label>Phone</label><input name="phone" class="form-control"></div>
  <div class="mb-3">
    <label>Hospital</label>
    <select name="hospital_id" class="form-select">
      @foreach($hospitals as $h) <option value="{{ $h->id }}">{{ $h->name }}</option> @endforeach
    </select>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
