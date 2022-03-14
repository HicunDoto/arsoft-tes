@extends('layout.dashboard')

@section('title','Tambah Data')

@section('table-responsive')
   <div class="col-6">   
      <h4>Tambah Data</h4>
      <form method="post" action="{{url('/tambah')}}">

        @csrf
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
    @error('title')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <div class="form-group">
    <label>Detail</label>
    <input type="text" name="detail" value="{{ old('detail') }}" class="form-control @error('detail') is-invalid @enderror" placeholder="Detail">
    @error('detail')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <div class="form-group">
    <label>Status</label>
    <input type="text" name="status" value="waiting" class="form-control @error('status') is-invalid @enderror" placeholder="Status">
    @error('status')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection