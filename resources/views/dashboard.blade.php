@extends('layout.master2')
@section('content')
<div class="row">
  @foreach ($data['all'] as $d)
<div class="col-6">
    <div class="card">
        <div class="card-header">
          <h5 class="card-title m-0">{{$d->nama_kim}}</h5>
        </div>
        <div class="card-body">
          <p class="card-text">{{$d->kabupaten_rol->kabupaten}}</p>
          <a href="/detail/{{$d->id}}}" class="btn btn-primary float-right">Lihat detail</a>
        </div>
      </div>
  
</div>
@endforeach
</div>

<div class="row">
  <div class="float-right">{{$data['all']->links()}}</div>
</div>
  
@endsection