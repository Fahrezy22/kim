@extends('Layout.master2')
@section('content')
@foreach ($data as $d)
<div class="col-6">
    <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title m-0">{{$d->nama}}</h5>
        </div>
        <div class="card-body">
          <img src="/upload/{{ $d['nama_gambar'] }}" alt="" width="100%" height="350px" >
        </div>
      </div>
</div>
@endforeach
@endsection