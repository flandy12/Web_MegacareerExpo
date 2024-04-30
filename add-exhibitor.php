<?php

error_reporting(0);
include "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$txtcompany = $_POST['txtcompany']; // value dari input company
$txtpic = $_POST['txtpic']; // value dari input company
$txtemail = $_POST['txtemail']; // value dari input company
$txttelp = $_POST['txttelp']; // value dari input company
$txtmobile = $_POST['txtmobile']; // value dari input company
$txtevent = $_POST['txtevent']; // value dari input company

$user_ip = $_SERVER['REMOTE_ADDR']; // Value dari IP user

// //validasi ip user apakah pernah terinput di database atau belum 
$query_select_user_ip =mysqli_query($koneksi, "SELECT ip_address FROM attempt_exhibitor_forms WHERE ip_address = '$user_ip'");

if ($query_select_user_ip->num_rows > 0) {
    echo"<meta http-equiv='refresh' content='0; url=exhibitor-thankyou.php'>";
} else {
    if(trim($txtcompany)==""){
        echo"<script>alert('Please fill in your company');window.location.href='exhibitor.php';</script>";
    }
    else if(trim($txtpic)==""){
        echo"<script>alert('Please fill in your company');window.location.href='exhibitor.php';</script>";
    }
    else if(trim($txtemail)==""){
        echo"<script>alert('Please fill in your company');window.location.href='exhibitor.php';</script>";
    }
    else if((trim($txttelp)=="") && (trim($txtmobile)=="")){
        echo"<script>alert('Please fill in an Office number or Mobile number');window.location.href='exhibitor.php';</script>";
    }

    echo "COMPANY : " . $txtcompany . "<br />";
    echo "PIC : " . $txtpic . "<br />";
    echo "EMAIL : " . $txtemail . "<br />";
    echo "EVENT : " . $txtevent . "<br />";

    $email_pengirim = 'noreply@megacareerexpo.com'; // Isikan dengan email pengirim
    $nama_pengirim = 'Mega Career Expo'; // Isikan dengan nama pengirim
    // $email_penerima = $_POST['email']; // Ambil email penerima dari inputan form
    $email_penerima = $txtemail;
    $subjek = "Thank You For Your Request as Exhibitor at ". $txtevent; // Ambil subjek dari inputan form
    //$pesan = "Test Mega Career Expo"; // Ambil pesan dari inputan form
    $mail = new PHPMailer;
    $mail->isSMTP();

    // $mail->Host = 'srv54.niagahoster.com';
    // $mail->Username = $email_pengirim; // Email Pengirim
    // $mail->Password = 'D&#^-ZHrCqjz'; // Isikan dengan Password email pengirim
    // $mail->Port = 465;

    $mail->Host = 'megacareerexpo.com';
    $mail->Username = $email_pengirim; // Email Pengirim
    $mail->Password = 'noreply@megacareer'; // Isikan dengan Password email pengirim
    $mail->Port = 465;

    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPDebug = 0; // Aktifkan untuk melakukan debugging

    $mail->setFrom($email_pengirim, $nama_pengirim);
    $mail->addAddress($email_penerima, '');
    $mail->addBcc('info@megacareerexpo.com');
    // $mail->addBcc('ricky.kevin15@gmail.com');
    $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

    ob_start();
    include "isiemail-exhibitor.php";

    $content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
    ob_end_clean();

    $mail->Subject = $subjek;
    $mail->Body = $content;

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
                echo '<h1>ERROR<br /><small>Error while sending email : '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
            }
        }else{ // Jika Ukuran file lebih dari 25 MB
        }
    }

    // add to database
    //$addtbexhibitor = mysqli_query($mysqli, "INSERT INTO tbreqexhibitor(companyreqexhibitor, picreqexhibitor, emailreqexhibitor, eventexhibitor) VALUES ('$txtcompany','$txtpic', '$txtemail', '$txtevent')");

    $addexhi="INSERT INTO tbreqexhibitor(companyreqexhibitor, picreqexhibitor, emailreqexhibitor, telpreqexhibitor, mobilereqexhibitor, eventexhibitor) VALUES ('$txtcompany','$txtpic', '$txtemail', '$txttelp', '$txtmobile','$txtevent')";
    $query_addexhi=mysqli_query($koneksi,$addexhi);

    $sendIptoDatabase = "INSERT INTO attempt_exhibitor_forms(id, ip_address, create_date) VALUES ('', '$user_ip', NOW())";
    $query_attempt_exhibitor_forms=mysqli_query($koneksi,$sendIptoDatabase);

    echo"<meta http-equiv='refresh' content='0; url=exhibitor-thankyou.php'>";
}	

?>