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
        @foreach ($data['anggota'] as $d)
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0">Anggota</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="float-left col-6">Kode KIM</label>
                            <p class="float-right col-6">: {{$d->kd_kim}}</p>
                        </div>
                        <div class="col-6">
                            <label for="" class="float-left col-6">Nama</label>
                            <p class="float-right col-6">: {{$d->nama}}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                            <label for="" class="float-left col-6">Nomor HP </label>
                            <p class="float-right col-6">: {{$d->hp}}</p>
                        </div>
                        <div class="col-6">
                            <label for="" class="float-left col-6">Email</label>
                            <p class="float-right col-6">: {{$d->email}}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                            <label for="" class="float-left col-6">Jenis Kelamin</label>
                            @if ($d->jk == 'L')
                                <p class="float-right col-6">: Laki Laki</p>
                            @else
                                <p class="float-right col-6">: Perempuan</p>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="" class="float-left col-6">Pendidikan</label>
                            <p class="float-right col-6">: {{$d->pendidikan}}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                            <label for="" class="float-left col-6">Agama</label>
                            <p class="float-right col-6">: {{$d->agama}}</p>
                        </div>
                        <div class="col-6">
                            <label for="" class="float-left col-6">Alamat</label>
                            <p class="float-right col-6">: {{$d->alamat_lengkap}}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                            <label for="" class="float-left col-6">Tanggal lahir</label>
                            <p class="float-right col-6">: {{date('d-m-Y', strtotime($d->ttl))}}</p>
                        </div>
                        <div class="col-6">
                            <label for="" class="float-left col-6">Tempat Lahir</label>
                            <p class="float-right col-6">: {{$d->tempat_lahir}}</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        @endforeach
</div>
  
@endsection
