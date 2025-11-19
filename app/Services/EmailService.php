<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService
{
    public function kirimPendaftaran($data)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = env('MAIL_HOST');
            $mail->SMTPAuth   = true;
            $mail->Username   = env('MAIL_USERNAME');
            $mail->Password   = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port       = env('MAIL_PORT');

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Pendaftaran Online');
            $mail->addAddress($data->email);
            $mail->addReplyTo(env('MAIL_FROM_ADDRESS'), 'Information');
            $mail->addCC('kresnomurtiprabowo1991@gmail.com', 'Information');

            $mail->isHTML(true);
            $mail->Subject = 'Konfirmasi Pendaftaran';

            $mail->Body = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; border-radius: 10px; background: linear-gradient(135deg, #f0f4ff, #ffffff); box-shadow: 0 4px 12px rgba(0,0,0,0.1);'>
                
                <div style='text-align: center; margin-bottom: 20px;'>
                    <img src='https://img.icons8.com/color/48/000000/ok--v1.png' alt='Success' style='width: 48px; height: 48px;' />
                    <h2 style='color: #1a73e8; margin: 10px 0 0 0;'>Pendaftaran Berhasil!</h2>
                </div>

                <p>Halo <b>$data->nama</b>,</p>
                <p>Terima kasih telah melakukan pendaftaran. Berikut adalah rincian pembayaran Anda:</p>

                <table style='width: 100%; border-collapse: collapse; margin-top: 15px; background-color: #f9f9f9; border-radius: 8px; overflow: hidden;'>
                    <tr style='background-color: #e6f0ff;'>
                        <th style='padding: 10px; text-align: left;'>Detail</th>
                        <th style='padding: 10px; text-align: left;'>Informasi</th>
                    </tr>
                    <tr>
                        <td style='padding: 10px;'>Nominal Transfer</td>
                        <td style='padding: 10px;'>Rp ".number_format($data->nominal)."</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px;'>Bank</td>
                        <td style='padding: 10px;'>$data->bank</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px;'>Atas Nama</td>
                        <td style='padding: 10px;'>$data->anbank</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px;'>Tanggal Transfer</td>
                        <td style='padding: 10px;'>$data->tanggal_transfer</td>
                    </tr>
                </table>

                <div style='text-align: center; margin-top: 25px;'>
                    <a href='https://www.youtube.com/watch?v=Sv5_0xrkvQY' style='text-decoration: none; background-color: #1a73e8; color: white; padding: 12px 25px; border-radius: 5px; display: inline-block; font-weight: bold;'>Cek Status Pendaftaran</a>
                </div>

                <p style='margin-top: 25px;'>Jika ada pertanyaan, balas email ini atau hubungi panitia.</p>
                <p>Salam hangat,<br><b>Panitia Pendaftaran Online</b></p>
            </div>
            ";

            return $mail->send();
        }
        catch (Exception $e) {
            logger("Pengiriman email gagal: {$mail->ErrorInfo}");
            return false;
        }
    }
}