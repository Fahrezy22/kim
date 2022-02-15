@extends('Layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$data['jumlah_daerah']}}</h3>
              <p>Jumblah Daerah</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$data['jumlah_kim']}}</h3>
              <p>Jumlah kim</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$data['jumlah_gambar']}}</h3>
              <p>Jumlah Gambar</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$data['jumlah_berita']}}</h3>
              <p>Jumlah Berita</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
    
      <div class="row">
       
        <div class="col-6">
            @foreach ($data['berita'] as $d)
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">{{$d->judul_berita}}</h5>
                </div>
                <div class="card-body">
                    <p>
                        {{$d->deskripsi}}
                    </p>
                </div>
              </div>
              @endforeach
        </div>
        
        
        <div class="col-6">
            @foreach ($data['gambar'] as $d)
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">{{$d->nama}}</h5>
                </div>
                <div class="card-body">
                  <img src="/upload/{{ $d['nama_gambar'] }}" alt="" width="100%" height="250px" >
                </div>
              </div>
              @endforeach
        </div>
        
      </div>
</div>
@endsection