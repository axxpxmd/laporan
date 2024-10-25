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

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>
    <div class="col-md-6 container my-5">
        <p class="text-center fw-bold fs-4">LIST DESKRIPSI</p>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade text-center show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <a href="{{ url('/') }}" class="btn btn-sm btn-danger m-r-5"><i class="bi bi-arrow-left m-r-10"></i>Kembali</a>
        <button type="button" onclick="create()" class="btn btn-sm btn-success"><i class="bi bi-plus m-r-10"></i>Tambah Data</button>
        <div class="mt-2">
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Deskripsi</th>
                        <th width="10%">is api</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $index => $i)
                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td>{{ $i->deskripsi }}</td>
                            <td class="text-center">{{ $i->is_api }}</td>
                            <td class="text-center">
                                <a href="#" onclick="edit({{ $i->id }})" class="btn btn-sm btn-primary m-r-5"><i class="bi bi-pencil m-r-10"></i>Edit</a>
                                <a href="{{ route('deskripsi.destroy', $i->id) }}" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-sm btn-danger"><i class="bi bi-trash m-r-10"></i>Hapus</a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('deskripsi.store') }}" method="POST" id="form">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label fw-bold">Deskripi : </label>
                            <textarea class="form-control" rows="4" name="deskripsi" id="deskripsi"></textarea>
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
<script>
    let table = new DataTable('#myTable');

    function create(){
        $('#exampleModal').modal('show');

        $('#deskripsi').html("")
        $('#modal-title').html("Tambah Data")

        $('#form').attr('action', "{{ route('deskripsi.store') }}");
    }

    function edit(id){
        $('#exampleModal').modal('show');
        $('#modal-title').html("Edit Data")

        // get detail data
        url = "{{ route('deskripsi.edit', ':id') }}".replace(':id', id);
        $.get(url, function(data){
            $('#deskripsi').html(data.deskripsi)

        }, 'JSON');

        $('#form').attr('action', "{{ route('deskripsi.update', ':id') }}".replace(':id', id));
    }
</script>
</html>
