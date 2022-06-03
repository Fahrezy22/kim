@extends('Layout.master')
@section('breadcumb')
    User
@endsection
@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable User</h3>
    
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
              <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Username</th>
              <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Password</th>
              <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Level</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @php
            $no= 1;
            @endphp
            @foreach ($data as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->username}}</td>
                <td>{{$d->password}}</td>
                <td>{{$d->level}}</td>
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

    </div>
    <!-- /.card-body -->
  </div>
    
    <!-- /.card-body -->
</div>

<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User</h4>
            </div>
            <form action="{{ route('user') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" type="text" placeholder="username" required>
                        <label>password</label>
                        <input class="form-control" name="password" type="password" placeholder="password" required>
                        <label>Level</label>
                        <select class="form-control" name="level" type="text"  required>
                            <option value="" selected disabled>Pilih</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                        </select>
                        
                        {{-- <input class="form-control" name="level" type="text" placeholder="level" required> --}}
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


@foreach ($data as $d)
<form action="/user/update/{{$d->id}}" method="POST">
    @csrf
    <div id="edit-{{$d->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" type="text" value="{{$d->username}}" required>
                        <label>password</label>
                        <input class="form-control" name="password" type="text" value="{{$d->password}}" required>
                        <label>Level</label>
                        <select class="form-control" name="level" type="text"  required>
                            <option value="" selected disabled>Pilih</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
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


@foreach ($data as $d)
<div id="delete-{{$d->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus user</h4>
            </div>
            <div class="modal-body">
                <h3>Apakah anda yakin ingin menghapus data <strong>{{ $d->username }}</strong> ?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <a href="/user/delete/{{$d->id}}" class="btn btn-danger">HAPUS</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection