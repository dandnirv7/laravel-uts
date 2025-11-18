<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Berhasil</title>
    <style>
        body {
            background: #e7e7e7;
            font-family: Arial, sans-serif;
        }
        .success-box {
            width: 600px;
            margin: 60px auto;
            background: #f5f0eb;
            padding: 30px;
            border-radius: 8px;
            border: 3px solid #1b75bb;
            text-align: center;
        }
        .success-header {
            background: #1b75bb;
            color: white;
            padding: 15px;
            font-size: 20px;
            border-radius: 5px;
            margin-bottom: 25px;
        }
        .success-icon {
            font-size: 70px;
            color: #1b75bb;
            margin-bottom: 20px;
        }
        .text {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .btn-home {
            background: #1b75bb;
            color: white;
            padding: 10px 20px;
            border: none;
            margin-top: 25px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-home:hover {
            background: #155f98;
        }
    </style>
</head>
<body>

<div class="success-box">
    <div class="success-header">Pendaftaran Berhasil</div>

    <div class="success-icon">✔️</div>

    <p class="text">Terima kasih <strong>{{ $data->nama }}</strong> telah melakukan pendaftaran.</p>
    <p class="text">Data Anda sudah kami terima dan akan segera diproses.</p>

    <a href="{{ url('/') }}" class="btn-home">Kembali ke Beranda</a>
</div>

</body>
</html>
