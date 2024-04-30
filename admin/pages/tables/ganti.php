<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="../../../assets/plugins/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap-min.css">
<script src="../../../js/jquery-2.1.3.min.js"></script>

<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $checkbox1 = $_POST['spot'];
    $message = $_POST['message'];
    $accept = $_POST['accept'];
    $chk = "";
    foreach ($checkbox1 as $chk1) {
        $chk .= $chk1 . ",";
    }

    // update user data
    $result = mysqli_query($mysqli, "UPDATE orders SET name='$name',email='$email',phone='$phone',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',spot='$chk',message='$message',accept='$accept' WHERE order_id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: data.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM orders WHERE order_id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['name'];
    $email = $user_data['email'];
    $phone = $user_data['phone'];
    $tgl_awal = $user_data['tgl_awal'];
    $tgl_akhir = $user_data['tgl_akhir'];
    $spot = $user_data['spot'];
    $message = $user_data['message'];
    $accept = $user_data['accept'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="data.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="ganti.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email;?>></td>
            </tr>
            <tr> 
                <td>Mobile</td>
                <td><input type="text" name="phone" value=<?php echo $phone;?>></td>
            </tr>
            <tr> 
                <td>Tanggal Awal</td>
                <td><input type="text" name="tgl_awal" class="form-control strtDate" value=<?php echo $tgl_awal;?>></td>
            </tr>
            <tr> 
                <td>Tanggal Akhir</td>
                <td><input type="text" name="tgl_akhir" class="form-control endDate" value=<?php echo $tgl_akhir;?>></td>
            </tr>
            <tr> 
                <td>Spot</td>
                <td>
                    <input type="text" name="tgl_akhir" disabled value=<?php echo $spot;?>><br>
                    <input type="checkbox" name="spot[]" value="alfamidi1"> (1)Alfamidi Kemanggisan<br>
                    <input type="checkbox" name="spot[]" value="alfamidi2"> (2)Alfamidi Kemanggisan<br>
                    <input type="checkbox" name="spot[]" value="alfamidi3"> (3)Alfamidi Kemanggisan<br></td>
            </tr>
            <tr> 
                <td>Message</td>
                <td><input type="text" name="message" value=<?php echo $message;?>></td>
            </tr>
            <tr> 
                <td>Accept</td>
                <td><input type="text" name="accept" value=<?php echo $accept;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <script type="text/javascript" src="../../../assets/plugins/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../../../assets/js/bootstrap-min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".strtDate").datepicker({
                dateFormat: 'dd-mm-yy',
                autoclose: true,
                minDate: 'now',
                todayHighlight: true
            });
            $(".endDate").datepicker({
                dateFormat: 'dd-mm-yy',
                autoclose: true,
                minDate: 'now',
                todayHighlight: true
            });
        });
    </script>
</body>
</html>