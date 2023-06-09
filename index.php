<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/constants.php';

$msg = '';//一時的に残すが理解できたらいずれは消す
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // $firstName = strip_tags($_POST['first-name']);
    $firstName = substr(strip_tags($_POST['first-name']), 0, 255);
    if (strlen($firstName) === 0) {
        $errors[] = '名前が入力されていません';
    }
    // $lastName = strip_tags($_POST['last-name']);
    $lastName = substr(strip_tags($_POST['last-name']), 0, 255);
    if (strlen($lastName) === 0) {
        $errors[] = '名字が入力されていません';
    }
    $email = $_POST['email'];
    $content = substr(strip_tags($_POST['content']), 0, 16384) ;
    if (strlen($content) === 0) {
        $errors[] = '内容が入力されていません';
    }

    if (!PHPMailer::validateAddress($email)) {
        $msg .= "Error: invalid email address provided";
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
        $mail->Subject = $lastName . ' ' .  $firstName . ' 様からの問い合わせ';
        $mail->Body = "問い合わせフォームより\n\n" . $content;
        $mail->CharSet = PHPMailer::CHARSET_UTF8;
        $mail->setFrom(SMTP_USERNAME, $lastName . ' ' . $firstName);
        $mail->addAddress('cocoiru@thinkdiycafe.sakura.ne.jp');
        $mail->addReplyTo($email, $lastName . ' ' . $firstName);
        if (count($errors) === 0) {
            if (!$mail->send()) {
                $msg .= 'Mailer Error: ' . $mail->ErrorInfo;
                $errors[] = "申し訳ありません。なんらかの不具合によりメールが送信できませんでした";
            } else {
                $msg .= 'Message sent!';
            }
        }
    }
}

$title = 'ホーム';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';
