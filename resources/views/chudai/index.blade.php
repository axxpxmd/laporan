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
    <div class="col-md-6 container my-5">
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
                        <th>Match Name</th>
                        <th width="10%">Image</th>
                        <th>Date</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $index => $i)
                        <tr>
                            <td class="text-center">{{ $index+1 }}</td>
                            <td>{{ $i->match_name }}</td>
                            <td class="text-center">
                                <a data-fancybox data-caption='{{ $i->match_name }}' href="{{ asset('151/'. $i->image) }}">Lihat File</a>
                            </td>
                            <td class="text-center">{{ \Carbon\Carbon::parse( $i->date)->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <a href="#" onclick="edit({{ $i->id }})" class="btn btn-sm btn-primary m-r-5"><i class="bi bi-pencil m-r-10"></i>Edit</a>
                                <a href="{{ route('deskripsi.destroy', $i->id) }}" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-sm btn-danger"><i class="bi bi-trash m-r-10"></i>Hapus</a>
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
</script>
</html>
