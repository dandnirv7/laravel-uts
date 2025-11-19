<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Services\EmailService;

class PendaftaranController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function index()
    {
        return view('pendaftaran.form');
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date|before:today',
            'hp' => ['required', 'string', 'max:13', 'regex:/^[0-9]+$/'],
            'email' => 'required|email|max:50|unique:pendaftaran,email',
            'nominal_backend' => 'required|numeric|min:10000',
            'bank' => 'required|string|max:30',
            'anbank' => 'required|string|max:40',
            'tanggal_transfer' => 'required|date|before_or_equal:today',
            'gambar' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter.',
            'hp.required' => 'Nomor HP wajib diisi.',
            'hp.regex' => 'Nomor HP hanya boleh berisi angka.',
            'hp.max' => 'Nomor HP maksimal 13 digit.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'nominal_backend.required' => 'Nominal wajib diisi.',
            'nominal_backend.numeric' => 'Nominal harus berupa angka.',
            'nominal_backend.min' => 'Nominal minimal Rp 10.000.',
            'bank.required' => 'Nama bank wajib diisi.',
            'anbank.required' => 'Atas nama bank wajib diisi.',
            'tanggal_transfer.required' => 'Tanggal transfer wajib diisi.',
            'tanggal_transfer.date' => 'Tanggal transfer tidak valid.',
            'tanggal_transfer.before_or_equal' => 'Tanggal transfer tidak boleh di masa depan.',
            'gambar.required' => 'Bukti transfer wajib diunggah.',
            'gambar.mimes' => 'File harus berupa JPG, JPEG, PNG, atau PDF.',
            'gambar.max' => 'Ukuran file maksimal 2 MB.',
        ]);

        $file = $request->file('gambar');
        $namaFile = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('Dokumen/'), $namaFile);

        $data = Pendaftaran::create([
            'nama'              => $request->nama,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'hp'                => $request->hp,
            'email'             => $request->email,
            'nominal'           => $request->nominal_backend, 
            'bank'              => $request->bank,
            'anbank'            => $request->anbank,
            'gambar'            => $namaFile,
            'tanggal_transfer'  => $request->tanggal_transfer,
            'ipaddress'         => $request->ip(),
        ]);

        $this->emailService->kirimPendaftaran($data);

        return view('pendaftaran.sukses', compact('data'));
    }
}