<!DOCTYPE html>
<html>
<head>
    <title>Data Pekerjaan Hari ini</title>
    {{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
    <!-- font Awesome -->
    {{HTML::style("assets/css/font-awesome.min.css")}}
</head>
<body>
    <h1><center>Data Pekerjaan Hari ini</center></h1>
    <hr>
    <table border=0px cellpadding="0" cellspacing="0" style="borderCollapse:collapse;">
    <tr>
        <td style="padding:1px 10px 5px 10px;">Nama</td>
        <td style="padding:1px 10px 5px 10px;">:</td>
        <td>{{ Sentry::getUser()->first_name . ' ' . Sentry::getUser()->last_name }}</td>
    </tr>
    <tr>
        <td style="padding:1px 10px 5px 10px;">Jabatan</td>
        <td style="padding:1px 10px 5px 10px;">:</td>
        <td>{{ $jbtn=Jabatan::where('id','=',Sentry::getUser()->jabatan)->first()->nama }}</td>
    </tr>
    <tr>
        <td style="padding:1px 10px 5px 10px;">Unit</td>
        <td style="padding:1px 10px 5px 10px;">:</td>
        <td>{{ $unit=Unit::where('id','=',Sentry::getUser()->unit)->first()->nama }}</td>
    </tr>
    <tr>
        <td style="padding:1px 10px 5px 10px;">Unit Kerja</td>
        <td style="padding:1px 10px 5px 10px;">:</td>
        <td>{{ $unitkerja=unitkerja::where('id','=',Sentry::getUser()->unit_kerja)->first()->nama }}</td>
    </tr>
    <tr>
        <td style="padding:1px 10px 5px 10px;">Tanggal</td>
        <td style="padding:1px 10px 5px 10px;">:</td>
        <td>{{ \Carbon\Carbon::now()->format('d-m-Y');}}</td>
    </tr>
    </table>
    <hr>
    <table border=1px cellpadding="0" cellspacing="0" style="borderCollapse:collapse;">
        <thead>
        <tr style="text-align:center;">                            
            <td width=5%>No</td>
            <td width=7%>Unit</td>
            <td width=40%>Pilihan Tugas</td>
            <td width=40%>Hasil Kerja</td>
            <td width=7%>Volume Kerja</td>
            <td width=10%>Satuan</td>
            <td width=7%>Validasi</td>
        </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach($datas as $value)
            <tr>
                <td style="text-align:center;"><?php echo $no ?></td>
                <td style="padding:1px 1px 5px 10px;">{{$value->unit}}</td>
                <td style="padding:1px 10px 5px 10px; text-align:justify;">{{$value->tujab}}</td>
                <td style="padding:1px 10px 5px 10px; text-align:justify;">{{$value->keterangan}}</td>
                <td style="text-align:center;">{{$value->qty}}</td>
                <td style="text-align:center;">{{$value->satuan}}</td>
                <td style='text-align:center;'>@if($value->validation==1)
                        {{-- <i class='fa fa-check'></i> --}} YES
                        @elseif($value->validation==0)
                            {{-- <i class='fa fa-times'></i> --}} NO
                    @endif
                </td>
                <?php $no++; ?>
            </tr>
            @endforeach    
        </tbody>
    </table>
    <br>
    <table border=0px style="borderCollapse:collapse;" align="right">
        <tr>
            <td>Tanda tangan</td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td>{{ Sentry::getUser()->first_name . ' ' . Sentry::getUser()->last_name }}</td>
        </tr>
    </table>
</body>
</html>
