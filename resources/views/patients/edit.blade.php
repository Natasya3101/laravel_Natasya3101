@extends('layouts.app')
@section('content')
<h4>Edit Patient</h4>
<form method="POST" action="{{ route('patients.update',$patient) }}">
  @csrf @method('PUT')
  <div class="mb-3"><label>Name</label><input name="name" value="{{ $patient->name }}" class="form-control"></div>
  <div class="mb-3"><label>Address</label><textarea name="address" class="form-control">{{ $patient->address }}</textarea></div>
  <div class="mb-3"><label>Phone</label><input name="phone" value="{{ $patient->phone }}" class="form-control"></div>
  <div class="mb-3">
    <label>Hospital</label>
    <select name="hospital_id" class="form-select">
      @foreach($hospitals as $h) <option value="{{ $h->id }}" {{ $patient->hospital_id==$h->id?'selected':'' }}>{{ $h->name }}</option> @endforeach
    </select>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
