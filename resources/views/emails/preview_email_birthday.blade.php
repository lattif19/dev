<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT SUMBER SEGARA PRIMADAYA</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        .judul {
            background-color: #363b36;
            color: white;
        }
    </style>
</head>
@foreach ($reminders as $d)

Yth. {{ $d->user->pegawai->nama }},
<br>
<br>
Berikut kami sampaikan :
<br>
<br>
@endforeach
<body>
    <table>
        <tr>
            <td style="width: 250px" class="judul"> <b> Subject </b> </td> 
            @foreach ($reminders as $d)
                
            <td> {{ $d->nama }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="judul"> <b>Reminder Date</b> </td>
            @foreach ($reminders as $d)
                
            <td> {{ tanggl_id(($d->tanggal_pengingat)) }} </td>
            @endforeach
        </tr>
        <tr>
            <td class="judul"> <b>Description</b> </td>
            @foreach ($reminders as $d)
                
            <td>{{ $d->keterangan }}</td>
            @endforeach
        </tr>
    </table>

    <p>Salam,
        <br>
        <br>
        <br>
    IT Support
    </p>
    
</body>
</html>
