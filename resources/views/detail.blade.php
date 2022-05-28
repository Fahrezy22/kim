@extends('layout.master2')
@section('content')

<div class="row">
    <div class="col-12">
        @foreach ($data['kim'] as $d)
        <div class="card">
            <div class="card-header">
              <h5 class="card-title m-0">Detail KIM</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                    <label for="" class="float-left col-5">Kode KIM</label>
                    <p class="float-right col-7">{{$d->kd_kim}}</p>
                </div>
                <div class="col-6">
                    <label for="" class="float-left col-5">Nama KIM</label>
                    <p class="float-right col-7">{{$d->nama_kim}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                    <label for="" class="float-left col-5">Email </label>
                    <p class="float-right col-7">{{$d->email_kim}}</p>
                </div>
                <div class="col-6">
                    <label for="" class="float-left col-5">Kabupaten</label>
                    <p class="float-right col-7">{{$d->kabupaten_rol->kabupaten}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                    <label for="" class="float-left col-5">Media Sosial </label>
                    <p class="float-right col-7">{{$d->medsos}}</p>
                </div>
                <div class="col-6">
                    <label for="" class="float-left col-5">Kecamatan</label>
                    <p class="float-right col-7">{{$d->kecamatan}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                    <label for="" class="float-left col-5">Web Resmi</label>
                    <p class="float-right col-7">{{$d->web_resmi}}</p>
                </div>
                <div class="col-6">
                    <label for="" class="float-left col-5">Desa</label>
                    <p class="float-right col-7">{{$d->desa}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                    <label for="" class="float-left col-5">Tanggal Terbentuk</label>
                    <p class="float-right col-7">{{date('d-m-Y', strtotime($d->tanggal_terbentuk))}}</p>
                </div>
                <div class="col-6">
                    <label for="" class="float-left col-5">Alamat</label>
                    <p class="float-right col-7">{{$d->alamat_kim}}</p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Anggota</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Nomor hp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data['anggota'] as $d)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{date('d-m-Y', strtotime($d->ttl))}}</td>
                                    <td>
                                        @if ($d->jk == "L")
                                            Laki - laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                    <td>{{$d->agama}}</td>
                                    <td>{{$d->hp}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection
