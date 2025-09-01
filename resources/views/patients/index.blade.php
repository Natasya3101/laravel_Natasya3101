@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h4>Patients</h4>
  <a href="{{ route('patients.create') }}" class="btn btn-success">Add</a>
</div>

<div class="row mb-3">
  <div class="col-md-4">
    <select id="filter-hospital" class="form-select">
      <option value="">-- All Hospitals --</option>
      @foreach($hospitals as $h)
        <option value="{{ $h->id }}">{{ $h->name }}</option>
      @endforeach
    </select>
  </div>
</div>

<table class="table table-bordered" id="patients-table">
  <thead><tr><th>ID</th><th>Name</th><th>Hospital</th><th>Phone</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($patients as $p)
    <tr id="patient-{{ $p->id }}">
      <td>{{ $p->id }}</td>
      <td>{{ $p->name }}</td>
      <td>{{ $p->hospital?->name }}</td>
      <td>{{ $p->phone }}</td>
      <td>
        <a href="{{ route('patients.edit',$p) }}" class="btn btn-sm btn-primary">Edit</a>
        <button class="btn btn-sm btn-danger btn-delete-patient" data-id="{{ $p->id }}">Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $patients->links() }}
@endsection

@push('scripts')
<script>
$('#filter-hospital').on('change', function(){
    const id = $(this).val();
    if(!id){
        location.href = '{{ route("patients.index") }}';
        return;
    }
    // fetch filtered list via ajax and rebuild table body
    $.get('/patients/by-hospital/'+id, function(data){
        let rows = '';
        data.forEach(function(p){
            rows += `<tr id="patient-${p.id}"><td>${p.id}</td><td>${p.name}</td><td>${$('#filter-hospital option:selected').text()}</td><td>${p.phone}</td><td><a class="btn btn-sm btn-primary" href="#">Edit</a> <button class="btn btn-sm btn-danger btn-delete-patient" data-id="${p.id}">Delete</button></td></tr>`;
        });
        $('#patients-table tbody').html(rows);
    });
});

$(document).on('click','.btn-delete-patient',function(){
    if(!confirm('Delete?')) return;
    let id = $(this).data('id');
    $.ajax({
        url: '/patients/'+id+'/ajax-delete',
        type: 'DELETE',
        data: {_token: '{{ csrf_token() }}'},
        success(){ $('#patient-'+id).remove(); }
    });
});
</script>
@endpush
