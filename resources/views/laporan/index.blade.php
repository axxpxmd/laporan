<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LAPORAN</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>
    <div class="col-md-6 container my-5">
        <p class="text-center fw-bold fs-4">LAPORAN</p>
        <a href="{{ url('/') }}" class="btn btn-sm btn-danger m-r-5"><i class="bi bi-arrow-left m-r-10"></i>Kembali</a>
        <div class="row mb-2 mt-4">
            <label for="bulan" class="col-form-label s-12 col-md-2 font-weight-bolder">Bulan</label>
            <div class="col-sm-8">
                <select id="bulan" onchange="getParams()" class="select2 form-control r-0 s-12">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
        </div>
        <div class="row mb-2">
            <label for="projek" class="col-form-label s-12 col-md-2 font-weight-bolder">Projek</label>
            <div class="col-sm-8">
                <input type="text" id="projek" onchange="getParams()" class="form-control r-0 s-12 col-md-12" autocomplete="off"/>
            </div>
        </div>
        <div class="row mb-2">
            <label for="projek" class="col-form-label s-12 col-md-2 font-weight-bolder">Nama</label>
            <div class="col-sm-8">
                <select id="pelapor_id" onchange="getParams()" class="select2 form-control r-0 s-12">
                    @foreach ($pelapor as $i)
                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <a href="#" id="periodeGenerate" target="_blank" class="btn btn-primary btn-sm"><i class="bi bi-save m-r-10"></i>Generate</a>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<SCript>
    getParams();
    function getParams(){
        bulan = $('#bulan').val();
        projek = $('#projek').val();
        pelapor_id = $('#pelapor_id').val();

        urlGenerate = "{{ route('createLaporan', ':bulan') }}?projek=".replace(':bulan', bulan)+projek+"&pelapor_id="+pelapor_id

        $('#periodeGenerate').attr('href', urlGenerate)
    }
</SCript>
</html>
