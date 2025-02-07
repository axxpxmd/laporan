<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LAPORAN</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>
    <div class="col-md-8 container my-5">
        <p class="text-center fw-bold fs-4">CODE 1.51</p>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade text-center show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <a href="{{ url('/') }}" class="btn btn-sm btn-danger m-r-5"><i class="bi bi-arrow-left m-r-10"></i>Kembali</a>
        <a href="{{ route('1.51.create') }}" class="btn btn-sm btn-success"><i class="bi bi-plus m-r-10"></i>Tambah Data</a>
        <div class="col-md mt-4">
            <div class="row">
                <div class="col-md">
                    <input type="date" class="form-control form-control-sm" value="{{ $date }}" onchange="filter()" id="date_filter"></input>
                </div>
                <div class="col-md">
                    <select class="form-select form-select-sm" onchange="filter()" id="date_status_filter">
                        <option value="OFF" {{ $date_status == 'OFF' ? 'selected' : '' }}>OFF</option>
                        <option value="ON" {{ $date_status == 'ON' ? 'selected' : '' }}>ON</option>
                    </select>
                </div>
                <div class="col-md">
                    <select class="form-select form-select-sm" onchange="filter()" id="status_filter">
                        <option value="null" {{ $status == 'null' ? 'selected' : '' }}>All</option>
                        <option value="X" {{ $status == 'X' ? 'selected' : '' }}>X</option>
                        <option value="W" {{ $status == 'W' ? 'selected' : '' }}>W</option>
                        <option value="L" {{ $status == 'L' ? 'selected' : '' }}>L</option>
                    </select>
                </div>
                <div class="col-md">
                    <select class="form-select form-select-sm" onchange="filter()" id="code_filter">
                        <option value="null" {{ $code == 'null' ? 'selected' : '' }}>All</option>
                        <option value="1.51" {{ $code == '1.51' ? 'selected' : '' }}>1.51</option>
                        <option value="1.53" {{ $code == '1.53' ? 'selected' : '' }}>1.53</option>
                        <option value="1.56" {{ $code == '1.56' ? 'selected' : '' }}>1.56</option>
                    </select>
                </div>
                <div class="col-md">
                    <select class="form-select form-select-sm" onchange="filter()" id="round_filter">
                        <option value="null" {{ $round == 'null' ? 'selected' : '' }}>All</option>
                        <option value="HT" {{ $round == 'HT' ? 'selected' : '' }}>HT</option>
                        <option value="FT" {{ $round == 'FT' ? 'selected' : '' }}>FT</option>
                    </select>
                </div>
                <div class="col-md">
                    <select class="form-select form-select-sm" onchange="filter()" id="hdp_filter">
                        <option value="null" {{ $hdp == 'null' ? 'selected' : '' }}>All</option>
                        <option value="0:0" {{ $hdp == '0:0' ? 'selected' : '' }}>0:0</option>
                        <option value="1/4" {{ $hdp == '1/4' ? 'selected' : '' }}>1/4</option>
                        <option value="1/2" {{ $hdp == '1/2' ? 'selected' : '' }}>1/2</option>
                        <option value="3/4" {{ $hdp == '3/4' ? 'selected' : '' }}>3/4</option>
                    </select>
                </div>
                <div class="col-md">
                    <select class="form-select form-select-sm" onchange="filter()" id="type_filter">
                        <option value="null" {{ $type == 'null' ? 'selected' : '' }}>All</option>
                        <option value="HDP" {{ $type == 'HDP' ? 'selected' : '' }}>HDP</option>
                        <option value="MIX" {{ $type == 'MIX' ? 'selected' : '' }}>MIX</option>
                    </select>
                </div>
                <div class="col-md">
                    <a href="#" id="url_filter" class="btn btn-sm btn-success"><i class="bi bi-filter m-r-10"></i>Filter</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="mt-2">
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="35%">Match Name</th>
                        <th width="20%">Result</th>
                        <th width="5%"></th>
                        <th width="10%">Image</th>
                        <th width="10%">Date</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $index => $i)
                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td>{{ $i->match_name }}</td>
                            <td>
                                {{ $i->result }}
                            </td>
                            <td class="text-center">
                                @if ($i->status)
                                    @if ($i->status == 'W')
                                        <span class="fw-bold text-success">W</span>
                                    @elseif($i->status == 'L')
                                        <span class="fw-bold text-danger">L</span>
                                    @else
                                        <span class="fw-bold text-black">X</span>
                                    @endif
                                @endif
                            </td>
                            <td class="text-center">
                                <a data-fancybox data-caption='{{ $i->match_name }}' href="{{ asset('151/'. $i->image) }}">Lihat File</a>
                            </td>
                            <td class="text-center">{{ \Carbon\Carbon::parse( $i->date)->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <a href="#" onclick="edit({{ $i->id }})" class="btn btn-sm btn-primary m-r-5"><i class="bi bi-pencil m-r-10"></i>Edit</a>
                                <a href="{{ route('1.51.destroy', $i->id) }}" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-sm btn-danger"><i class="bi bi-trash m-r-10"></i>Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title">CODE 1.51</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="form">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="result" class="col-form-label fw-bold">Result : </label>
                            <textarea class="form-control" rows="4" name="result" id="result" required></textarea>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="W" name="status" id="status1" required>
                            <label class="form-check-label" for="status1">
                                W
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="L" name="status" id="status2" required>
                            <label class="form-check-label" for="status2">
                                L
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="X" name="status" id="status3" required>
                            <label class="form-check-label" for="status3">
                                X
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x m-r-10"></i>Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-save m-r-10"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center">
            <img src="#" id="url_image" width="50%" alt="">
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
    // Your custom options
    });

    let table = new DataTable('#myTable');

    function filter(){
        date_filter = $('#date_filter').val();
        status_filter = $('#status_filter').val();
        code_filter = $('#code_filter').val();
        round_filter = $('#round_filter').val();
        date_status_filter = $('#date_status_filter').val();
        hdp_filter = $('#hdp_filter').val();
        type_filter = $('#type_filter').val();


        url = "{{ route('1.51') }}?date=" + date_filter + "&status=" + status_filter + "&code=" + code_filter + "&round=" + round_filter + "&date_status=" + date_status_filter + "&hpd=" + hdp_filter + "&type=" + type_filter

        $('#url_filter').attr('href', url);
    }

    function edit(id){
        $('#exampleModal').modal('show');

        // get detail data
        url = "{{ route('1.51.edit', ':id') }}".replace(':id', id);
        $.get(url, function(data){
            $('#result').html(data.result)
            if (data.status == 'W') {
                $("#status1").prop("checked", true);
            } else if(data.status == 'L') {
                $("#status2").prop("checked", true);
            } else {
                $("#status3").prop("checked", true);
            }

            url_image = "{{ asset('151/:image') }}".replace(':image', data.image);
            console.log(url_image);
            $('#url_image').attr('src', url_image);

        }, 'JSON');

        $('#form').attr('action', "{{ route('1.51.update', ':id') }}".replace(':id', id));
    }

</script>
</html>
