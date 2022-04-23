@extends('Layout.master2')
@section('content')
@if ($data->count())
  <div class="row">
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
  </div>
@else
<div class="row">
  <div class="col-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Data Gambar</h5>
      </div>
      <div class="card-body">
        <p>Data Gambar Kosong</p>
      </div>
    </div>
  </div>
</div>
@endif
@endsection