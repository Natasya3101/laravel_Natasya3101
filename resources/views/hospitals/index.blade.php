@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h4>Hospitals</h4>
  <a href="{{ route('hospitals.create') }}" class="btn btn-success">Add</a>
</div>
<table class="table table-bordered">
  <thead><tr><th>ID</th><th>Name</th><th>Address</th><th>Email</th><th>Phone</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($hospitals as $h)
    <tr id="hospital-{{ $h->id }}">
      <td>{{ $h->id }}</td>
      <td>{{ $h->name }}</td>
      <td>{{ $h->address }}</td>
      <td>{{ $h->email }}</td>
      <td>{{ $h->phone }}</td>
      <td>
        <a href="{{ route('hospitals.edit',$h) }}" class="btn btn-sm btn-primary">Edit</a>
        <button class="btn btn-sm btn-danger btn-delete-hospital" data-id="{{ $h->id }}">Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $hospitals->links() }}
@endsection

@push('scripts')
<script>
$(document).on('click','.btn-delete-hospital',function(){
    if(!confirm('Delete?')) return;
    let id = $(this).data('id');
    $.ajax({
        url: '/hospitals/'+id+'/ajax-delete',
        type: 'DELETE',
        data: {_token: '{{ csrf_token() }}'},
        success(){ $('#hospital-'+id).remove(); }
    });
});
</script>
@endpush
