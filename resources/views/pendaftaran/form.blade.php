<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Online</title>
    <style>
        body {
            background: #e7e7e7;
            font-family: Arial;
        }
        .container {
            width: 750px;
            margin: 20px auto;
            background: #f5f0eb;
            padding: 20px;
            border: 3px solid #1b75bb;
        }
        .header {
            background: #1b75bb;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .row {
            display: flex;
            margin-bottom: 12px;
        }
        .row input[type="text"],
        .row input[type="date"],
        .row input[type="email"],
        .row input[type="number"] {
            width: 94%;
            padding: 6px;
            border: 1px solid #aaa;
            background: #f5f0eb;
        }
        .col {
            width: 50%;
            padding: 5px;
        }
        .upload-box {
            width: 150px;
            height: 150px;
            border: 2px solid #1b75bb;
            margin: 10px auto;
            background: white url('https://i.imgur.com/YR1ZfWf.png') center no-repeat;
        }
        .submit-btn {
            width: 120px;
            padding: 10px;
            color: white;
            background: #1b75bb;
            border: none;
            cursor: pointer;
            display: block;
            margin: 20px auto 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">Pendaftaran</div>

    <form action="{{ route('pendaftaran.simpan') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col">
                <input type="text" name="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="col">
                <input type="text" name="tempat_lahir" placeholder="Tempat Lahir">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="date" name="tanggal_lahir">
            </div>
            <div class="col">
                <input type="text" name="hp" placeholder="Handphone" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="email" name="email" placeholder="E-Mail" required>
            </div>
            <div class="col">
                <input type="number" name="nominal" placeholder="Nominal" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" name="bank" placeholder="Bank" required>
            </div>
            <div class="col">
                <input type="text" name="anbank" placeholder="A. N. Bank" required>
            </div>
        </div>

        <div class="upload-box"></div>

        <input type="file" name="gambar" style="margin-left: 300px" required>

        <div class="row">
            <div class="col">
                <input type="date" name="tanggal_transfer" required>
            </div>
        </div>

        <button class="submit-btn">Submit</button>
    </form>
</div>

</body>
</html>
