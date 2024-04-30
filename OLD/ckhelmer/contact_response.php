<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$email_pengirim = 'noreply@clothvin.id'; // Isikan dengan email pengirim
$nama_pengirim = 'clothvin.id'; // Isikan dengan nama pengirim
$email_penerima = $_POST['email']; // Ambil email penerima dari inputan form
$subjek = "CKHelmer"; // Ambil subjek dari inputan form
$pesan = "CKHelmer"; // Ambil pesan dari inputan form
$nama = $_POST['nama'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'srv54.niagahoster.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'D&#^-ZHrCqjz'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->SMTPDebug = 0; // Aktifkan untuk melakukan debugging

$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->addCC('info@clothvin.id');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

// Load file content.php
ob_start();
include "content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
// $mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email

if(empty($attachment)){ // Jika tanpa attachment
    $send = $mail->send();

    if($send){ // Jika Email berhasil dikirim
    }else{ // Jika Email gagal dikirim
    }
}else{ // Jika dengan attachment
    $tmp = $_FILES['attachment']['tmp_name'];
    $size = $_FILES['attachment']['size'];

    if($size <= 25000000){ // Jika ukuran file <= 25 MB (25.000.000 bytes)
        $mail->addAttachment($tmp, $attachment); // Add file yang akan di kirim

        $send = $mail->send();

        if($send){ // Jika Email berhasil dikirim
            echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
        }else{ // Jika Email gagal dikirim
            echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
        }
    }else{ // Jika Ukuran file lebih dari 25 MB
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Contact Us</h2>
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#" class="active">Contact Us</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Map -->
    <div class="contact_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.574058014568!2d106.8216252143403!3d-6.187711062347341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f425e1c6c42d%3A0x3cac8e963b2e37f7!2sGedung%20Sarinah!5e0!3m2!1sid!2sid!4v1594024219380!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- End Map -->

    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Contact Info</h2>
                    <p>Need an expert? you are more than welcomed to leave your contact info and we will be in touch shortly.</p>
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="#">Location</a>
                            <a href="#">Phone</a>
                            <a href="#">Email</a>
                        </div>
                        <div class="address">
                            <a href="#">Sarinah BD floor 11 MH.Thamrin Street no.11 Jakarta Pusat <br> Jakarta 10350 </a>
                            <a href="#">+(6221) 390 2791</a>
                            <a href="#">cs@ckhelmer.co.id</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Send Us a Message</h2>
                    <form action="mail.php" method="POST" class="form-inline contact_box" enctype="multipart/form-data">
                        <input type="text" class="form-control input_box" name="nama" placeholder="First Name *">
                        <input type="text" class="form-control input_box" name="email" placeholder="Your Email *">
                        <input type="text" class="form-control input_box" name="subject" placeholder="Subject">
                        <textarea class="form-control input_box" name="message" placeholder="Message"></textarea>
                        <button type="submit" name="submit" class="btn btn-default">Send Message</button>
                    </form><br>
                    <h2>Thankyou for your email, we will response soon</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->
</body>
</html>
