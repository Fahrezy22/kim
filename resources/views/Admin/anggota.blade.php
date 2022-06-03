@extends('Layout.master')
@section('breadcumb')
    Anggota
@endsection
@section('content')

<div class="row">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataTable anggota</h3>
        
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
                <tr role="row"><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">NO</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Kode Kim</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Nama kim</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Anggota</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jenis kelamin</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tempat lahir</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tanggal lahir</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Agama</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Alamat lengkap</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Pendidikan</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">No hp</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no= 1;
                @endphp
                @foreach ($data['anggota'] as $d)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$d->kd_kim}}</td>
                    <td>{{$d->nama_kim}}</td>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->jk}}</td>
                    <td>{{$d->tempat_lahir}}</td>
                    <td>{{date('d-m-Y', strtotime($d->ttl))}}</td>
                    <td>{{$d->agama}}</td>
                    <td>{{$d->alamat_lengkap}}</td>
                    <td>{{$d->pendidikan}}</td>
                    <td>{{$d->hp}}</td>
                    <td>{{$d->email}}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal"
                            data-target="#edit-{{$d->id}}"><i class="fa fa-eye"></i>
                            Detail</button>
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


<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Anggota</h4>
            </div>
            <form action="{{ route('anggota') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Kim</label>
                        <select class="form-control" name="kd_kim" type="text" required>
                          <option value="" selected disabled>Pilih</option>
                          @foreach ($data['kim'] as $d)
                              <option value="{{$d->id}}">{{$d->kd_kim}}</option>
                          @endforeach
                        </select>
                        <input type="hidden" name="nama_kim">
                        <label>Nama</label>
                        <input class="form-control" name="nama" type="text" placeholder="nama" required>
                        <label>Jenis kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="" disabled="disabled">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <label>Tempat tanggal lahir</label>
                        <input class="form-control" name="ttl" type="text" placeholder="Tempat tanggal lahir" required>
                        <label>Agama</label>
                        <select class="form-control" name="agama" disabled="disabled">
                            <option value="">Islam</option>
                            <option value="">Protestan</option>
                            <option value="">Katolik</option>
                            <option value="">Hindu</option>
                            <option value="">Buddha</option>
                            <option value="">Konghucu</option>
                        </select>
                        <label>Alamat lengkap</label>
                        <input class="form-control" name="alamat_lengkap" type="text" placeholder="Alamat lengkap" required>
                        <label>Pendidikan</label>
                        <select class="form-control" name="pendidikan" disabled="disabled">
                            <option value="">SD</option>
                            <option value="">SMP</option>
                            <option value="">SMA</option>
                            <option value="">DIPLOMAT</option>
                            <option value="">SARJANA</option>
                            <option value="">PASCA SARJANA</option>
                            <option value="">DOCTOR</option>
                        </select>
                        <label>NO HP</label>
                        <input class="form-control" name="no_hp" type="text" placeholder="No Hp" required>
                        <label>Email</label>
                        <input class="form-control" name="email" type="text" placeholder="Email" required>
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


@foreach ($data['anggota'] as $d)
<form action="/anggota/update/{{$d->id}}" method="POST">
    @csrf
    <div id="edit-{{$d->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Anggota</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Kode kim</label>
                                <p>{{$d->kd_kim}}</p>
                                <label>Nama</label>
                                <p>{{$d->nama}}</p>
                                <label>Jenis Kelamin</label>
                                @if ($d->jk == 'L')
                                    <p>Laki-Laki</p>
                                @else
                                    <p>Perempuan</p>
                                @endif
                                <label>Email</label>
                                <p>{{$d->email}}</p>
                                <label>Nomor Hp</label>
                                <p>{{$d->hp}}</p>
                            </div>
                            <div class="col-6">
                                <label>Tempat Lahir</label>
                                <p>{{$d->tempat_lahir}}</p>
                                <label>Tanggal Lahir</label>
                                <p>{{date('d-m-Y', strtotime($d->ttl))}}</p>
                                <label>Alamat Lengkap</label>
                                <p>{{$d->alamat_lengkap}}</p>
                                <label>Agama</label>
                                <p>{{$d->agama}}</p>
                                <label>Pendidikan</label>
                                <p>{{$d->pendidikan}}</p>
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


@foreach ($data['anggota'] as $d)
<div id="delete-{{$d->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Anggota</h4>
            </div>
            <div class="modal-body">
                <h3>Apakah anda yakin ingin menghapus data <strong>{{ $d->nama }}</strong> ?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <a href="/anggota/delete/{{$d->id}}" class="btn btn-danger">HAPUS</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection