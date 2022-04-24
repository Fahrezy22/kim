@extends('Layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $data['jumlah_daerah'] }}</h3>
                    <p>Jumblah Daerah</p>
                </div>
                <div class="icon">
                    <i class="ion ion-map"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $data['jumlah_kim'] }}</h3>
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
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $data['jumlah_berita'] }}</h3>
                    <p>Jumlah Berita</p>
                </div>
                <div class="icon">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        @if($data['berita']->count())
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Data Berita</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($data['berita'] as $d)
                                <div class="col-4">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top"
                                            src="{{ asset('image/') }}/{{ $d->img }}" 
                                            alt="Card image cap" width="100px" height="150px">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $d->judul_berita }}</h4>
                                            <p class="card-text">{{ $d->deskripsi }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                      <a href="{{route('beritaAdmin')}}" class="btn btn-primary">Lihat selengkapnya ..</a>
                    </div>
                </div>
            </div>

        @else
            <div class="col-12">
                <h3>Data Berita</h3>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title m-0">Data Berita</h5>
                    </div>
                    <div class="card-body">
                        <p>Data Berita Kosong</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
