<?php
	if(!empty($_FILES['files']['name'][0]))
	{
		//getting info about the file
	$file=$_FILES['files'];
	$failed=array();
	$uploaded=array();
	//allowed extension
	$allowed=array('png','jpg');

	foreach ($file['name'] as $position => $file_name) {
		//extracting file info
		$file_tmp_name = $file['tmp_name'][$position];
		$file_error =$file['error'][$position];
		$file_size = $file['size'][$position];
		//extracting extension
		$file_ext = explode('.', $file_name);
		$file_ext=strtolower(end($file_ext));

		if(in_array($file_ext, $allowed))
		{
			//getting unique name and uploading
			$new_file_name=uniqid('',true).'.'.$file_ext;
			$file_dest='files/'. $new_file_name ;
			if(move_uploaded_file($file_tmp_name, $file_dest))
			{
				echo 'file uploaded sucessfully';
			}
			else
				echo 'file not uploaded';

		}else{
			//errors for file extension
			$failed[$position]="[{$file_name}] file extension '{$file_ext}'' not allowed";
		}
	}
	if(!empty($failed))
	{
		print_r($failed);
	}



	}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post" action="multiple_uploads.php" enctype="multipart/form-data">
		<input type="file" name="files[]" multiple></input>
		<input type="submit" value="upload"></input>
	</form>
</body>
</html>