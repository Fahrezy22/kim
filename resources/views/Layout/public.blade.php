@extends('layout.master2')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-body">
        @if ($pesan = Session::get('error'))
        <div class="alert alert-danger">
          <strong>{{$pesan}}</strong>
        </div>
    @endif
    @if ($pesan = Session::get('succes'))
    <div class="alert alert-success">
      <strong>{{$pesan}}</strong>
    </div>
    @endif
        <h5 class="card-title">TAMBAH DATA</h5>
        <p class="card-text">
            
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <form action="{{ route('kim') }}" method="POST">
                                  @csrf
                                  <label>Kode Kim</label>
                                  <input class="form-control" type="text" name="kd_kim" id="kd_kim" placeholder="Kode kim" required>
                                  <label>Nama Kim</label>
                                  <input class="form-control" id="nama_kim"name="nama_kim" type="text" placeholder="Nama Kim" required>
                                <label>Nama</label>
                                <input class="form-control" name="nama" type="text" placeholder="Nama" required>
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" name="jk" id="" required>
                                  <option value="" disabled selected>--Pilih--</option>
                                  <option value="L">Laki Laki</option>
                                  <option value="P">Perempuan</option>
                                </select>
                                <label> tanggal lahir</label>
                                <input class="form-control" name="tanggal_lahir" type="date" placeholder="Tem lahir" required>
                                <label> Tempat lahir</label>
                                <input class="form-control" name="tempat_lahir" type="text" placeholder="Tempat lahir" required>
                            </div>
                            <div class="col-6">
                                <label>Alamat lengkap</label>
                                <textarea name="alamat_lengkap" class="form-control" id="" cols="5" rows="4" placeholder="Alamat" required></textarea>
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama" id="" required>
                                  <option value="" disabled selected>--Pilih--</option>
                                  <option value="islam">Islam</option>
                                  <option value="protestan">Protestan</option>
                                  <option value="khatolik">Khatolik</option>
                                  <option value="hindu">Hindu</option>
                                  <option value="budha">Budha</option>
                                  <option value="konghucu">Konghucu</option>
                                </select>
                                <label for="agama">Pendidikan</label>
                                <select class="form-control" name="pendidikan" id="" required>
                                  <option value="" disabled selected>--Pilih--</option>
                                  <option value="sd">Sd</option>
                                  <option value="smp">Smp</option>
                                  <option value="sma">Sma</option>
                                  <option value="diploma">Diploma</option>
                                  <option value="sarjana">Sarjana</option>
                                  <option value="pasca_sarjana">Pasca Sarjana</option>
                                  <option value="doctor">Doktor</option>
                                </select>
                                <label> Email</label>
                                <input class="form-control" name="email" type="text" placeholder="Email" required>
                                <label> Nomor Hp</label>
                                <input class="form-control" name="hp" type="text" placeholder="Nomor Hp" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </p>
      </div>
    </div><!-- /.card -->
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function(){

    $( "#kd_kim" ).keyup(function() {
      var kd = $('#kd_kim').val();
      $.ajax({
        url : '{{route('search')}}',
        data : {
            'kd': kd
        },
        method: 'GET',
        dataType: 'json',
        success : function(data) {
          $('#nama_kim').val(data.nama_kim);
        },
      });
    });

  });
  </script>
@endsection