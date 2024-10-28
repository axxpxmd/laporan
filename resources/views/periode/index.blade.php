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
        <p class="text-center fw-bold fs-4">LIST PERIODE</p>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <a href="{{ url('/') }}" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left m-r-10"></i>Kembali</a>
        <div class="row mb-2 mt-2">
            <label for="bulan" class="col-form-label s-12 col-md-2 font-weight-bolder">Bulan</label>
            <div class="col-sm-8">
                <select id="bulan" onchange="getParams()" class="form-select">
                    <option value="1" {{ $bulan == 1 ? 'selected' : '-' }}>Januari</option>
                    <option value="2" {{ $bulan == 2 ? 'selected' : '-' }}>Februari</option>
                    <option value="3" {{ $bulan == 3 ? 'selected' : '-' }}>Maret</option>
                    <option value="4" {{ $bulan == 4 ? 'selected' : '-' }}>April</option>
                    <option value="5" {{ $bulan == 5 ? 'selected' : '-' }}>Mei</option>
                    <option value="6" {{ $bulan == 6 ? 'selected' : '-' }}>Juni</option>
                    <option value="7" {{ $bulan == 7 ? 'selected' : '-' }}>Juli</option>
                    <option value="8" {{ $bulan == 8 ? 'selected' : '-' }}>Agustus</option>
                    <option value="9" {{ $bulan == 9 ? 'selected' : '-' }}>September</option>
                    <option value="10" {{ $bulan == 10 ? 'selected' : '-' }}>Oktober</option>
                    <option value="11" {{ $bulan == 11 ? 'selected' : '-' }}>November</option>
                    <option value="12" {{ $bulan == 12 ? 'selected' : '-' }}>Desember</option>
                </select>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <a href="#" id="periodeUrl" class="btn btn-success btn-sm m-r-5"><i class="bi bi-filter m-r-10"></i>Filter</a>
                <a href="#" id="periodeGenerate" class="btn btn-primary btn-sm"><i class="bi bi-save m-r-10"></i>Generate</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Bulan</th>
                        <th>tahun</th>
                        <th>Hari</th>
                        <th>Libur</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($periode as $index => $i)
                        <tr>
                            <td>{{ $i->tanggal }}</td>
                            <td>{{ Carbon\Carbon::now()->month($i->bulan)->isoFormat('MMMM') }}</td>
                            <td>{{ $i->tahun }}</td>
                            <td>{{ $i->hari }}</td>
                            <td>
                                @if ($i->is_libur == 1)
                                    <span class="fw-bold text-danger">Libur</span>
                                @else
                                    <span class="fw-bold text-success">Tidak</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($i->is_libur == 1)
                                <a href="{{ route('periodeBatalkanLibur', $i->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash m-r-10"></i>Batalkan Libur</a>
                                @else
                                <a href="{{ route('periodeLibur', $i->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-check m-r-10"></i>Liburkan</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data. Silahkan generate</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    getParams();
    function getParams(){
        bulan = $('#bulan').val();

        url = "{{ route('periode') }}?bulan=" + bulan
        urlGenerate = "{{ route('generatePeriode', ':bulan') }}".replace(':bulan', bulan);

        $('#periodeUrl').attr('href', url)
        $('#periodeGenerate').attr('href', urlGenerate)
    }
</script>
</html>
