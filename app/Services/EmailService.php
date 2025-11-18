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
            // $mail->addCC('kresnomurtiprabowo1991@gmail.com', 'Information');

            $mail->isHTML(true);
            $mail->Subject = 'Konfirmasi Pendaftaran';

            $mail->Body = "
                Halo <b>$data->nama</b>,<br><br>
                Terima kasih telah melakukan pendaftaran.<br>

                <table border='0'>
                    <tr><td>Nominal Transfer</td><td>: Rp ".number_format($data->nominal)."</td></tr>
                    <tr><td>Bank</td><td>: $data->bank</td></tr>
                    <tr><td>Atas Nama</td><td>: $data->anbank</td></tr>
                    <tr><td>Tanggal Transfer</td><td>: $data->tanggal_transfer</td></tr>
                </table>

                <br>Salam,<br>
                Panitia Pendaftaran Online
            ";

            return $mail->send();
        }
        catch (Exception $e) {
            logger("Pengiriman email gagal: {$mail->ErrorInfo}");
            return false;
        }
    }
}