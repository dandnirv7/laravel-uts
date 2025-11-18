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
            'nama'              => 'required|max:50',
            'hp'                => 'required|max:13',
            'email'             => 'required|email|max:50',
            'nominal'           => 'required|integer',
            'bank'              => 'required|max:30',
            'anbank'            => 'required|max:40',
            'tanggal_transfer'  => 'required|date',
            'gambar'            => 'required|mimes:jpg,png,jpeg,pdf|max:2048',
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
            'nominal'           => $request->nominal,
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