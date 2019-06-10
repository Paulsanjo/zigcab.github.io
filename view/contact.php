<?php
//contacting ot database
$connect=mysqli_connect("localhost","root","","zigcab") or die("Connection Error!");;
$data = json_decode(file_get_contents("php://input"));
if(count($data)>0)
{
	$f_name = mysqli_real_escape_string($connect, $data -> fname);
	$f_email = mysqli_real_escape_string($connect, $data -> femail);
	$f_phone = mysqli_real_escape_string($connect, $data -> fphone);
	$f_sub = mysqli_real_escape_string($connect, $data -> fsub);
	$f_msg = mysqli_real_escape_string($connect, $data -> fmsg);
	$query = "INSERT INTO `contacts` (`id`, `fname`, `femail`, `fphone`, `fsub`, `fmsg`, `ftime`) VALUES (NULL, '$f_name', '$f_email', '$f_phone', '$f_sub', '$f_msg', CURRENT_TIMESTAMP);";
	if(mysqli_query($connect,$query))
	{
		echo "DATA INSERTED SUCCESSFULLY";
	}
	else
	{
		echo "error spoted";
	}
}
?>