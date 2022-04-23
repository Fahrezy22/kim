@extends('Layout.master2')
@section('content')

@if ($data->count())
            @php
              $no= 1;
            @endphp
<div class="row">
  <div class="col-6">
  @foreach ($data as $d)
    <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title m-0">{{$d->judul_berita}}</h5>
        </div>
        <div class="card-body">
          <p class="card-text" id="dots">
                <span id="more">{{$d->deskripsi, 100}}</span>
          </p>
        </div>
      </div>
  @endforeach
</div></div>
@else
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Data Berita</h5>
          </div>
          <div class="card-body">
            <p>Data Berita Kosong</p>
          </div>
        </div>
      </div>
    </div>
@endif

@endsection
@section('js')
<script type="text/javascript">
    // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
    function myFunction(i) {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}
    </script>
@endsection