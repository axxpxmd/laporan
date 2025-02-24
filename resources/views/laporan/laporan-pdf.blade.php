<!DOCTYPE html>
<html lang="en">
<head>
    <title>LAPORAN {{ Carbon\Carbon::now()->month($bulan)->isoFormat('MMMM') }}</title>

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
    <div style="margin-top: -35px !important; margin-bottom: -100px !important">
        <p style="position: absolute; margin-top: 220px !important; margin-left: 95px !important; font-size: 24px ">Bulan {{ Carbon\Carbon::now()->month($bulan)->isoFormat('MMMM') }} {{ date('Y') }} LAPORAN</p>
        @if ($nama == "Asip Hamdi")
        <p style="position: absolute; margin-top: 450px !important; margin-left: 810px !important; font-size: 24px ">{{ $nama }}</p>
        @endif
        @if ($nama == "Aolia Ikhwanudin")
        <p style="position: absolute; margin-top: 450px !important; margin-left: 755px !important; font-size: 24px ">{{ $nama }}</p>
        @endif
        <p style="position: absolute; margin-top: 490px !important; margin-left: 710px !important; font-size: 24px ">{{ $posisi }}</p>
        <img style="margin-left: -30px !important" src="{{ public_path('assets/cover_depan.jpeg') }}" alt="" width="105%">
    </div>
    <div>
        <p>&nbsp;</p>
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
    </div>
    <div>
        <img src="{{ public_path('assets/'. $pelapor->image_path) }}" alt="" width="100%">
    </div>
</body>
</html>
