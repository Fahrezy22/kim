<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Kabupaten</h3>
                <div class="float-right">
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#univ-modal">Tambah Data</button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <p class="text-muted font-13 m-b-30">
                    @if ($msg = Session::get('status'))
                    <div class="alert alert-success">
                        {{$msg}}
                    </div>
                    @endif
                </p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                                <th >Kode Kim</th>
                                <th >Nama kim</th>
                                <th >Nama Anggota</th>
                                <th >Jenis kelamin</th>
                                <th >Tempat lahir</th>
                                <th >Tanggal lahir</th>
                                <th >Agama</th>
                                <th >Alamat lengkap</th>
                                <th >Pendidikan</th>
                                <th >No hp</th>
                                <th >Email</th>
                                <th >Aksi</th>
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
                        <tr>
                            <th >Kode Kim</th>
                                <th >Nama kim</th>
                                <th >Nama Anggota</th>
                                <th >Jenis kelamin</th>
                                <th >Tempat lahir</th>
                                <th >Tanggal lahir</th>
                                <th >Agama</th>
                                <th >Alamat lengkap</th>
                                <th >Pendidikan</th>
                                <th >No hp</th>
                                <th >Email</th>
                                <th >Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>