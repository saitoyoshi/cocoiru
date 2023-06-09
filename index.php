<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/constants.php';

$msg = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = strip_tags($_POST['first-name']);
    $lastName = strip_tags($_POST['last-name']);
    $email = $_POST['email'];
    $content = strip_tags($_POST['content']);

    if (!PHPMailer::validateAddress($email)) {
        $msg .= "Error: invalid email address provided";
    } else {
        $mail = new PHPMailer();
        // $mail->SMTPDebug = 2; //デバッグ用
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = SMTP_HOST;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Encoding = "base64";
        $mail->Subject = $lastName . ' ' .  $firstName . ' 様からの問い合わせ';
        $mail->Body = "問い合わせフォームより\n\n" . $content;
        $mail->CharSet = PHPMailer::CHARSET_UTF8;
        $mail->setFrom(SMTP_USERNAME, $lastName . ' ' . $firstName);
        $mail->addAddress('cocoiru@thinkdiycafe.sakura.ne.jp');
        $mail->addReplyTo($email, $lastName . ' ' . $firstName);

        if (!$mail->send()) {
            $msg .= 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $msg .= 'Message sent!';
        }
    }
}

$title = 'ホーム';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';
