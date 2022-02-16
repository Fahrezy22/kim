@extends('Layout.master2')
@section('content')

<div class="col-6">
  @foreach ($data as $d)
    <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title m-0">{{$d->judul_berita}}</h5>
        </div>
        <div class="card-body">
          <p class="card-text" id="dots">
            {{ str_limit($d->deskripsi, 100, '') }}
            @if (strlen($d->deskripsi) > 100)
                <span id="more">{{ substr($d->deskripsi, 100) }}</span>
            @endif
          </p>
          <button onclick="myFunction()" id="myBtn">Read more</button>
        </div>
      </div>
      @endforeach
</div>

@endsection
@section('js')
<script type="text/javascript">
    // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
    function myFunction() {
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