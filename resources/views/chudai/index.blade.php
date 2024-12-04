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
        <div class="mt-2">
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="30%">Match Name</th>
                        <th width="30%">Result</th>
                        <th width="10%">Image</th>
                        <th width="10%">Date</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $index => $i)
                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td>{{ $i->match_name }}</td>
                            <td>
                                {{ $i->result }}
                                @if ($i->status == 'W')
                                    <span class="fw-bold text-success">W</span>
                                @else
                                    <span class="fw-bold text-danger">L</span>
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
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data.</td>
                        </tr>
                    @endforelse
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x m-r-10"></i>Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-save m-r-10"></i>Simpan</button>
                    </div>
                </form>
            </div>
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

    function edit(id){
        $('#exampleModal').modal('show');

        // get detail data
        url = "{{ route('1.51.edit', ':id') }}".replace(':id', id);
        $.get(url, function(data){
            $('#result').html(data.result)
            if (data.status == 'W') {
                $("#status1").prop("checked", true);
            } else {
                $("#status2").prop("checked", true);
            }

        }, 'JSON');

        $('#form').attr('action', "{{ route('1.51.update', ':id') }}".replace(':id', id));
    }
</script>
</html>
