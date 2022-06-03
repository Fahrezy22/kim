@extends('Layout.master')
@section('breadcumb')
    Data Kim
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable Kim</h3>
    
        <div class="x_title">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add">Tambah</button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if ($pesan = Session::get('succes'))
            <div class="alert alert-success">
              <strong>{{$pesan}}</strong>
            </div>
        @endif
      <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
        <thead>
          <tr role="row"><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">No</th>
              <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Kode kim</th>
              <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Nama kim</th>
              <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">daerah</th>
              <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Detail</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @php
            $no= 1;
            @endphp
            @foreach ($data['kim'] as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->kd_kim}}</td>
                <td>{{$d->nama_kim}}</td>
                <td>{{$d->kabupaten_rol->kabupaten}}</td>
                <td><button class="btn btn-warning" data-toggle="modal"
                    data-target="#detail-{{$d->id}}"><i class="fa fa-eye"></i>
                    </button></td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal"
                        data-target="#edit-{{$d->id}}"><i class="fa fa-edit"></i>
                        Edit</button>
                    <button class="btn btn-danger" data-toggle="modal"
                        data-target="#delete-{{$d->id}}"><i class="fa fa-trash"></i>
                        Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
      </table>
    </div>
</div>

    </div>
    <!-- /.card-body -->
  </div>
    
    <!-- /.card-body -->
</div>

<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data kim</h4>
            </div>
            <form action="{{ route('datakim') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Kode kim</label>
                                <input class="form-control" name="kd_kim" type="text" placeholder="nama kim" required>
                                <label>Nama kim</label>
                                <input class="form-control" name="nama_kim" type="text" placeholder="nama kim" required>
                                <label>Kabupaten</label>
                                <select class="form-control" name="kd_daerah" type="text"  required>
                                    <option value="" selected disabled>Pilih</option>
                                    @foreach ($data['daerah'] as $d)
                                      <option value="{{$d->id}}">{{$d->kabupaten}}</option>
                                    @endforeach
                                </select>
                                <label>Email kim</label>
                                <input class="form-control" name="email_kim" type="text" placeholder="email kim" required>
                                <label>Medsos</label>
                                <input class="form-control" name="medsos" type="text" placeholder="medsos" required>
                            </div>
                            <div class="col-6">
                                <label>Web resmi</label>
                                <input class="form-control" name="web_resmi" type="text" placeholder="web resmi" required>
                                <label>Tanggal terbentuk</label>
                                <input class="form-control" name="tanggal_terbentuk" type="date" placeholder="tanggal terbentuk" required>
                                <label>Alamat kim</label>
                                <input class="form-control" name="alamat_kim" type="text" placeholder="alamat kim" required>
                                <label>Kecamatan</label>
                                <input class="form-control" name="kecamatan" type="text" placeholder="kecamatan" required>
                                <label>Desa</label>
                                <input class="form-control" name="desa" type="text" placeholder="desa" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


@foreach ($data['kim'] as $d)
<form action="/datakim/update/{{$d->id}}" method="POST">
    @csrf
    <div id="edit-{{$d->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit daerah</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Kode kim</label>
                                <input class="form-control" name="kd_kim" type="text" value="{{$d->kd_kim}}" required>
                                <label>Nama kim</label>
                                <input class="form-control" name="nama_kim" type="text" value="{{$d->nama_kim}}" required>
                                <label>Kode kdaerah</label>
                                <select class="form-control" name="kd_daerah" type="text"  required>
                                    <option value="" selected disabled>Pilih</option>
                                    @foreach ($data['daerah'] as $s)
                                    <option value="{{$s->id}}" {{$d->kd_daerah == $s->id  ? 'selected' : ''}}>{{$s->kabupaten}}</option>
                                    @endforeach
                                </select>
                                <label>Email kim</label>
                                <input class="form-control" name="email_kim" type="text" value="{{$d->email_kim}}" required>
                                <label>Medsos</label>
                                <input class="form-control" name="medsos" type="text" value="{{$d->medsos}}" required>
                            </div>
                            <div class="col-6">
                                <label>Web resmi</label>
                                <input class="form-control" name="web_resmi" type="text" value="{{$d->web_resmi}}" required>
                                <label>Tanggal terbentuk</label>
                                <input class="form-control" name="tanggal_terbentuk" type="date" value="{{$d->tanggal_terbentuk}}" required>
                                <label>Alamat kim</label>
                                <input class="form-control" name="alamat_kim" type="text" value="{{$d->alamat_kim}}" required>
                                <label>Kecamatan</label>
                                <input class="form-control" name="kecamatan" type="text" value="{{$d->kecamatan}}" required>
                                <label>Desa</label>
                                <input class="form-control" name="desa" type="text" value="{{$d->desa}}" required>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach


@foreach ($data['kim'] as $d)
<div id="delete-{{$d->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus data kim</h4>
            </div>
            <div class="modal-body">
                <h3>Apakah anda yakin ingin menghapus data <strong>{{ $d->kd_kim }}</strong> ?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <a href="/datakim/delete/{{$d->id}}" class="btn btn-danger">HAPUS</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($data['kim'] as $d)
    @csrf
    <div id="detail-{{$d->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">detail modal</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Kode kim</label>
                                <p>{{$d->kd_kim}}</p>
                                <label>Nama kim</label>
                                <p>{{$d->nama_kim}}</p>
                                <label>Daerah</label>
                                <p>{{$d->kabupaten_rol->kabupaten}}</p>
                                <label>Email kim</label>
                                <p>{{$d->email_kim}}</p>
                                <label>Medsos</label>
                                <p>{{$d->medsos}}</p>
                            </div>
                            <div class="col-6">
                                <label>Web resmi</label>
                                <p>{{$d->web_resmi}}</p>
                                <label>Tanggal terbentuk</label>
                                <p>{{$d->tanggal_terbentuk}}</p>
                                <label>Alamat kim</label>
                                <p>{{$d->alamat_kim}}</p>
                                <label>Kecamatan</label>
                                <p>{{$d->kecamatan}}</p>
                                <label>Desa</label>
                                <p>{{$d->desa}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">BATAL</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

@endsection