@extends('layout.dashboard')

@section('title','Edit Data')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data</h4>
      <form method="post" action="{{url('/edit')}}/{{$data->id}}">
        @method('put')
        @csrf
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="{{$data->title}}" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
    @error('title')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <div class="form-group">
    <label>Detail</label>
    <input type="text" name="detail" value="{{$data->detail}}" class="form-control @error('detail') is-invalid @enderror" placeholder="Detail">
    @error('detail')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status">
      @if ($data->status=="waiting")
      <option selected value="waiting">Waiting</option>
      <option value="on-process">On-process</option>
      <option value="done">Done</option>
      @elseif($data->status=="on-process")
      <option value="waiting">Waiting</option>
      <option selected value="on-process">On-process</option>
      <option value="done">Done</option>     
      @else
      <option value="waiting">Waiting</option>
      <option value="on-process">On-process</option>
      <option selected value="done">Done</option> 
      @endif
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection