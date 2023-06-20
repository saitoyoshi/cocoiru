<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/constants.php';

$errors = [];
$sendSuccess = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sendSuccess = false;
    $name = substr(strip_tags($_POST['name']), 0, 255);
    if (strlen($name) === 0) {
        $errors[] = '氏名が入力されていません';
    }
    $email = $_POST['email'];
    $content = substr(strip_tags($_POST['content']), 0, 16384) ;
    if (strlen($content) === 0) {
        $errors[] = '内容が入力されていません';
    }

    if (!PHPMailer::validateAddress($email)) {
        $errors[] = "メールアドレスの形式が正しくありません";
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
        $mail->Subject = $name . ' '  . ' 様からの問い合わせ';
        $mail->Body = "問い合わせフォームより\n\n" . $content;
        $mail->CharSet = PHPMailer::CHARSET_UTF8;
        $mail->setFrom(SMTP_USERNAME, $name);
        $mail->addAddress(SEND_TO);
        $mail->addReplyTo($email, $name);
        if (count($errors) === 0) {
            if (!$mail->send()) {
                $errors[] = "申し訳ありません。なんらかの不具合によりメールが送信できませんでした";
            } else {
                $sendSuccess = true;
                // exit;
            }
        }
    }
}

$title = 'ホーム';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';
