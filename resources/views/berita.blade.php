@extends('Layout.master2')
@section('content')

@if($data->count())
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Data Berita</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($data as $d)
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
                  {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
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
