<?Php

$file_upload="true";
$file_up_size=$_FILES['file_up'][size];
echo $_FILES[file_up][name];
if ($_FILES[file_up][size]>250000){$msg=$msg."Your uploaded file size is more than 250KB
 so please reduce the file size and then upload.<BR>";
$file_upload="false";}

if (!($_FILES[file_up][type] =="image/jpeg" OR $_FILES[file_up][type] =="image/gif"))
{$msg=$msg."Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
$file_upload="false";}

$file_name=$_FILES[file_up][name];
$add="upload/$file_name"; // the path with the file name where the file will be stored

if($file_upload=="true"){

if(move_uploaded_file ($_FILES[file_up][tmp_name], $add)){
	echo "SUCCESSFULL UPLOAD";
// do your coding here to give a thanks message or any other thing.
}else{echo "Failed to upload file Contact Site admin to fix the problem";}

}else{
echo $msg;
}
?>