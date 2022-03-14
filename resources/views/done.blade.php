@extends('layout.dashboard')

@section('title','Dashboard')

@section('table-responsive')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@if (session('admin'))
<div class="alert alert-success">
    {{ session('admin') }}
</div>
@endif
<div class="col-12">   
    <center>
      <div class="table-responsive">
        <table class="table">
             <thead class="thead-dark">
               <tr>
                 <th style="text-align: center;" scope="col">No</th>
                 <th style="text-align: center;" scope="col">Title</th>
                 <th style="text-align: center;" scope="col">Detail</th>
                 <th style="text-align: center;" scope="col">Status</th>
                 <th style="text-align: center;" scope="col">Aksi</th>
               </tr>
             </thead>
             <tbody>
               @foreach ($data as $datas)
               <tr>
                <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
                <td style="text-align: center;">{{$datas->title}}</td>
                <td style="text-align: center;">{{$datas->detail}}</td>
               <td style="text-align: center;"><b>{{$datas->status}}</b></td>
               <td style="text-align: center;"><a href="/edit/{{$datas->id}}" class="btn btn-outline-info"><span data-feather="edit"></span> Edit</a>
                  <form action="/dashboard/{{$datas->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger"><span data-feather="trash"></span> Hapus</button>
                  </form></td>
              </tr>
               @endforeach
             </tbody>
       </table>
         </div>
</center>
  </div>
    
@endsection