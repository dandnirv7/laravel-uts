<!DOCTYPE html>
<html lang="id" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pendaftaran Berhasil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-tr from-blue-400 to-blue-700 flex items-center justify-center p-6">

  <div class="bg-white rounded-xl shadow-xl max-w-md w-full p-8 text-center">
    <h1 class="text-3xl font-semibold text-blue-700 mb-6">Pendaftaran Berhasil</h1>

    <svg class="mx-auto mb-8 w-20 h-20 stroke-blue-700" fill="none" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 64 64" >
      <circle class="stroke-dasharray-[150] stroke-dashoffset-[150] animate-drawCircle" cx="32" cy="32" r="28" />
      <path class="stroke-dasharray-[48] stroke-dashoffset-[48] animate-drawCheck" d="M20 34 l10 10 l18 -18" />
    </svg>

    <p class="text-lg text-gray-800 mb-2">
      Terima kasih <strong class="font-semibold text-blue-700">{{ $data->nama }}</strong> telah melakukan pendaftaran.
    </p>
    <p class="text-lg text-gray-700 mb-8">
      Data Anda sudah kami terima dan akan segera diproses.
    </p>

    <a href="{{ url('/') }}" 
       class="inline-block bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300"
       role="button">
      Kembali ke Beranda
    </a>
  </div>

  <style>
    @keyframes drawCircle {
      to {
        stroke-dashoffset: 0;
      }
    }
    @keyframes drawCheck {
      to {
        stroke-dashoffset: 0;
      }
    }
    .animate-drawCircle {
      animation: drawCircle 0.6s ease forwards;
    }
    .animate-drawCheck {
      animation: drawCheck 0.4s ease 0.6s forwards;
    }
  </style>

</body>
</html>
