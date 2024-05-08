<!DOCTYPE html>
<html lang="en">
<head>
    <title>LAPORAN</title>

      <!-- Font -->
      <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

    <style type="text/css">
     body {
            padding-top: 0px !important;
            color: black !important;
        }
		table.d {
            border-collapse: collapse;
            width: 100%
        }

        table.d tr.d,th.d,td.d{
            table-layout: fixed;
            border: 1px solid black;
            font-size: 14px;
        }

        table.d td.d{
            padding: 10px !important
        }

        table.d th.p-10{
            padding: 10px !important
        }

        .text-center{
            text-align: center;
        }

        .p-l-5{
            padding-left: 5px;
        }
        .fs-14{
            font-size: 14px
        }
    </style>
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important">
    <table class="d">
        <thead style="background-color: #5B9BD5 !important">
            <tr class="d">
                <th class="d p-10" width="5%">No.</th>
                <th class="d p-10" width="10%">Hari/Tanggal</th>
                <th class="d p-10" width="35%">Deskripsi</th>
                <th class="d p-10" width="50%">Lampiran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periode as $index => $i)
            <tr>
                <td class="d text-center" style="background-color: #BFBFBF !important">{{ $index+1 }}</td>
                <td class="d">{{ Carbon\Carbon::now()->month($i->bulan)->day($i->tanggal)->isoFormat('dddd / D MMMM Y') }}</td>
                <td class="d">{{ $deskripsi[$index]->deskripsi }} Aplikasi {{ $projek }}</td>
                <td class="d text-center">
                    <img src="{{ asset('images/images ('.$num[$index].').png') }}" width="100%" alt="">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
