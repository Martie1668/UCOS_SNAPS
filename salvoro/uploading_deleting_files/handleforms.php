<?php  

// // Check if the form has been submitted by checking if the 
// // 'insertTextFileBtn' is set in the POST request
if (isset($_POST['insertTextFileBtn'])) {

    //     // Output the start of a preformatted text 
       echo "<pre>";
        
    //     // Print the details of the uploaded file from 
    //     // the $_FILES superglobal array
       print_r($_FILES['textFile']);
        
    //     // Close the preformatted text block
        echo "<pre>";
    
    //     // Store the uploaded file information in a submittedFile variable
        $submittedFile = $_FILES['textFile'];
    
    //     // Output the name of the uploaded file
        echo $_FILES['textFile']['name'] . "<br>";
        
    //     // Output the size of the uploaded file in bytes
         echo $_FILES['textFile']['size'] . "<br>";
     }

session_start();
if (isset($_POST['insertTextFileBtn'])) {

	$fileName = $_FILES['textFile']['name'];

	$tempFileName = $_FILES['textFile']['tmp_name'];

	$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);


	$uniqueID = sha1(md5(rand(1,9999999)));
	$imageName = $uniqueID.".".$fileExtension;

	$folder = "files/".$imageName;

	if (move_uploaded_file($tempFileName, $folder)) {
		$_SESSION['message'] = "File saved successfully!";
		header("Location: index.php");
	}
	
}





?>