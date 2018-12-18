<?php

use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Carbon\Carbon;

function send_email($subject, $to, $body) {
    $mail = new PHPMailer();

    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->Mailer = "smtp";
    $mail->Host = "tls://smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = "Mployeemarketplace@gmail.com"; // SMTP username
    $mail->Password = "Project!"; // SMTP password 

    $mail->setFrom("Mployeemarketplace@gmail.com", "GLOCALS");
    $mail->AddAddress($to);

    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $mail->IsHTML(true);
    $mail->CharSet = "utf-8";

    if (!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}