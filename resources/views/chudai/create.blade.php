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
        <p class="text-center fw-bold fs-4">CODE 1.51</p>
        <a href="{{ route('1.51') }}" class="btn btn-sm btn-danger m-r-5"><i class="bi bi-arrow-left m-r-10"></i>Kembali</a>
        <form action="{{ route('1.51.store') }}" id="new_document_attachment" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="match_name" class="col-form-label fw-bold">Match Name</label>
                <input type="text" class="form-control" name="match_name" required></input>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="document_attachment_doc" id="document_attachment_doc" required>
            </div>
            <div class="mb-3">
                <label for="description" class="col-form-label fw-bold">Description</label>
                <textarea class="form-control" rows="3" name="description" id="description"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script>
    const form = document.getElementById("new_document_attachment");
    const fileInput = document.getElementById("document_attachment_doc");

    fileInput.addEventListener('change', () => {
        form.submit();
    });

    window.addEventListener('paste', e => {
        fileInput.files = e.clipboardData.files;
    });
</script>
</html>
