<?php require_once('cn.php');

			

			if(isset($_POST['ins']))

			{

			$adno=$_POST['adno'];

			$q1="select * from lc where admissionno='$adno'";

			$res= mysqli_query($conn,$q1);

			$row= mysqli_fetch_assoc($res);
            if (mysqli_num_rows($res) > 0) {
                // Fetch and display the data
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '<table align="center" class="table-condensed table-bordered tab-content">';
                    echo '<tr><td>Admission No</td><td>' . $row['admissionno'] . '</td></tr>';
                    echo '<tr><td>ID</td><td>' . $row['id'] . '</td></tr>';
                    echo '<tr><td colspan="2"><img src="img/' . $row['img'] . '" height="400" width="400" class="img-thumbnail img-responsive" /></td></tr>';
                    echo '</table>';
                }
            } else {
                echo "<script>alert('Please check your Admission No');</script>";
            }
        }

 ?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>



<body>

<form name="frm" method="post" enctype="multipart/form-data">
        <br /><br />
        <table align="center" class="table-condensed table-bordered tab-content">
            <tr>
                <td>Admission No :</td>
                <td><input type="text" name="adno" class="form-control" required /></td>
                <td><input type="submit" name="ins" value="Check" class="btn btn-lg btn-danger btn-block"/></td>
            </tr>
        </table>
    </form>
<?php



?>

<br />

<br />



<table align="center" class="table-condensed table-bordered tab-content  ">

<tr>

<td>Admission NO  </td> 

<td><?php echo $row['admissionno']?></td>

</tr>


</form>



</body>

</html>

