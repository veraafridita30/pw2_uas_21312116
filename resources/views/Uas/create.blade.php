@extends('layout.master')

	@section('judul')
    Tambah Uas
    @endsection

    
@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script>
    $(function(){
        $('#example1').DataTable();
    });
</script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush

	@section('content')
    <form method="post" action="/uas">
        @csrf
        <div class="form-group">
            <label>Npm</label>
            <input type="text" name="npm" value="" class="form-control">
</div>
@error('npm')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
            <label>Nama</label>
            <input type="number" name="nama" value="" class="form-control">
</div>
@error('nama')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"></textarea>
</div>
@error('alamat')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection