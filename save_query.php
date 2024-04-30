<?php
	include_once("config.php");
 
	if(ISSET($_POST['save'])){
		if(!empty($_POST['name']) && !empty($_POST['tanggal'])){
			$name = addslashes($_POST['name']);
			$tanggal = $_POST['tanggal'];
			$isiupcoming = $_POST['isi'];
 
 
			$file = explode(".", $_FILES['photo']['name']);
			$ext = array("png", "gif", "jpg", "jpeg");
 
			if(in_array($file[1], $ext)){
				$file_name = $file[0].'.'.$file[1];
				$tmp_file = $_FILES['photo']['tmp_name'];
				$location = "images/".$file_name;
				$new_location = addslashes($location);
 
				if(move_uploaded_file($tmp_file, $location)){
					$koneksi->query("INSERT INTO `tbupcomingevent` VALUES('', '$name', '$tanggal', '$isiupcoming', '$new_location')");
					echo "<script>alert('Data Insert')</script>";
					echo "<script>window.location = 'admin'</script>";
				}
 
			}else{
				echo "<script>alert('File not available')</script>";
				echo "<script>window.location = 'admin'</script>";
			}
 
		}else{
			echo "<script>alert('Please complete the required field!')</script>";
			echo "<script>window.location = 'admin'</script>";
		}
 
 
	}
?>