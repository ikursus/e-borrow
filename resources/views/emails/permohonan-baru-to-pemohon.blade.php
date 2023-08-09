<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <p>Terima kasih {{ $permohonan->pegawaiPemohon->name }}</p>

    <p>Permohonan anda telah berjaya dihantar.</p>

    <p>No tiket permohonan anda adalah: {{ $permohonan->ticket }}</p>

    <p>Untuk menyemak status permohonan anda, sila layari ke:</p>

    <p>
        <a href="{{ route('pinjaman.result', ['ticket' => $permohonan->ticket]) }}">
            {{ route('pinjaman.status') }}
        </a>
    </p>

    <p>Sekian, terima kasih.</p>

</body>
</html>
