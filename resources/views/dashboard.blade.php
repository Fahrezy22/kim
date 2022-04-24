@extends('layout.master2')
@section('content')
<div class="row">
    @if($data['all']->count())
        @foreach($data['all'] as $d)
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0">{{ $d->nama_kim }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $d->kabupaten_rol->kabupaten }}</p>
                        <a href="/detail/{{ $d->id }}}" class="btn btn-primary float-right">Lihat detail</a>
                    </div>
                </div>

            </div>
        @endforeach
    @else
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                      <p>tidak ada data yang di temukan</p>
                    </div>
                </div>
            </div>

        </div>
    @endif
</div>

<div class="row">
    <div class="float-right">{{ $data['all']->links() }}</div>
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
                <a href="{{route('berita')}}" class="btn btn-primary">Lihat selengkapnya ..</a>
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

@endsection
