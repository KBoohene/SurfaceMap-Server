<?php
/**
* @author:Kwabena Boohene
* @date:18/01/2017
* Moves classified road data into sql database
*/

include_once("coordinates.php");
$obj = new coordinates();

//Directory of stored coordinates on the server
$fileDir ="coordinates/";
$uploadfile = $fileDir . basename($_FILES['fileToUpload']['name']);

//Moves file from temp folder into final directory
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
   echo "Successful";
} else {
    echo "Possible file upload failed";
}


if(isset($_GET['confirm'])){

$files =  glob("coordinates/*.txt");

	foreach($files as $file) {
	$obj->readFile($file);
	}

	foreach($files as $file){
		unlink($file);
	}

}

?>
