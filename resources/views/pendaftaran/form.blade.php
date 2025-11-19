<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn { animation: fadeIn 0.3s forwards; }
    </style>
</head>
<body class="bg-gray-100 py-10">

<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h1 class="bg-blue-600 text-white text-center py-3 rounded-lg mb-6 text-xl font-semibold">
        Form Pendaftaran
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="form-pendaftaran" action="{{ route('pendaftaran.simpan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-input name="nama" label="Nama Lengkap" placeholder="Masukkan nama lengkap" />
            <x-input name="tempat_lahir" label="Tempat Lahir" placeholder="Masukkan tempat lahir" />
            <x-input type="date" name="tanggal_lahir" label="Tanggal Lahir" />
            <x-input name="hp" label="Handphone" placeholder="Masukkan nomor HP" />
            <x-input type="email" name="email" label="E-Mail" placeholder="Masukkan email" />
            <x-input id="nominal" name="nominal" label="Nominal" placeholder="Masukkan nominal" />

            <!-- Hidden input untuk backend -->
            <input type="hidden" name="nominal_backend" id="nominal_backend">

            <div class="relative">
                <label class="font-medium">Bank</label>
                <select name="bank" class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 transition-colors @error('bank') border-red-500 @enderror">
                    <option value="">Pilih Bank</option>
                    @foreach (['BCA','BNI','BRI','Mandiri'] as $bank)
                        <option value="{{ $bank }}" {{ old('bank') == $bank ? 'selected' : '' }}>{{ $bank }}</option>
                    @endforeach
                </select>
                @error('bank')
                <div class="absolute left-0 mt-1 text-red-600 text-sm animate-fadeIn">{{ $message }}</div>
                @enderror
            </div>

            <x-input name="anbank" label="A.N. Bank" placeholder="Nama pemilik rekening" />
        </div>

        <div class="my-6 relative">
            <label class="font-medium">Bukti Transfer</label>
            <div id="drop-area" class="mt-2 border-2 border-dashed rounded-xl p-8 bg-gray-50 text-center cursor-pointer transition duration-200 relative @error('gambar') border-red-500 @enderror">
                <p class="text-gray-700 font-medium">Klik atau drag file di sini</p>
                <p class="text-gray-500 text-sm">Gambar, PDF, atau dokumen</p>
            </div>

            <div id="preview-container" class="flex flex-row gap-4 mt-2" style="display: none">
                <img id="preview-thumb" class="w-32 h-32 object-cover rounded-xl border shadow-sm hidden">
                <div id="preview-icon" class="text-4xl hidden">📄</div>
                <div class="flex-1">
                    <p id="preview-name" class="font-medium"></p>
                    <p id="preview-size" class="text-sm text-gray-500"></p>
                    <button id="delete-preview" type="button" class="text-red-600 flex flex-row items-center text-sm hover:underline">
                        <x-bx-x class="inline-block w-6 h-6" />
                        Hapus File
                    </button>
                </div>
            </div>

            <input type="file" name="gambar" id="gambar" class="hidden" accept="image/*,.pdf">
            @error('gambar')
            <div class="absolute left-0 mt-1 text-red-600 text-sm animate-fadeIn">{{ $message }}</div>
            @enderror
        </div>

        <x-input type="date" name="tanggal_transfer" label="Tanggal Transfer" />

        <button class="mt-8 w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700 transition">
            Submit
        </button>
    </form>
</div>

<script src="{{ asset('./js/pendaftaran.js') }}"></script>
</body>
</html>
