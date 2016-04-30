<?php
if(isset($_FILES['file']))
{
	$file=$_FILES['file'];
	//properties of file
	$file_name=$file['name'];
	$file_tmp_name=$file['tmp_name'];
	$file_size=$file['size'];
	// echo $file_tmp_name;

	//file extension
	$file_ext= explode(".", $file_name);
	$file_ext=strtolower(end($file_ext));
	$allowed=array('rar','png');
	if(in_array($file_ext, $allowed))
	{
		//unique name to file
		$file_new_name=uniqid('',true).'.'.$file_ext;
		$file_dest='files/'. $file_new_name ;
		//uploading file
		if(move_uploaded_file($file_tmp_name, $file_dest))
		{
			echo 'File Sucessfully Uploaded';
		}
		else
		{
			echo 'file not uploaded';
		}
	}
	else
	{
		echo 'upload only .rar and .png ectension files';
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="upload.php" enctype="multipart/form-data">
<input type="file" name="file"></input>
<input type="submit" value="upload"></input>
</form>
</body>
</html>