<?php
			
			
	function check_login($con)
	{
		if(isset($_SESSION['id']))
		{
			$id = $_SESSION['id'];
			$query = "select * from login where id = '$id' limit 1";
			$result = mysqli_query($con,$query);
			
			if($result && mysqli_num_rows($result)>0)
			{
				$user_data = mysqli_fetch_assoc($result);
				return $yser_data;
				
			}
			
			
		}
			header("Location:loginpage.php");
		die;
	}
	
			
	
	function random_num($length)
	{
		$text = "";
		if($length < 5)
		{
			$length = 5;
		}
			$len = rand(4,length);
			for($i=0;$i<$len;$i++)
			{
				$text .= rand(0,9);
			}
			return $text;
			
	
	
	}
	
    require("connection.php");
	function getAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    return $result = mysqli_query($con, $query);
}

  
	
	



?>