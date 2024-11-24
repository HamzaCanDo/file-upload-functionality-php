<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload</title>
</head>
<body>

<pre>
<?php
// Define the allowed image mime types
$allowed = ['image/png', 'image/jpg', 'image/jpeg'];

if (isset($_FILES['photo'])) {
  // Check if the uploaded file type is allowed
  if (!in_array($_FILES['photo']['type'], $allowed)) {
    echo 'Only jpg, jpeg, png files are allowed';
    exit;
  }

 
  
    if ($_FILES['photo']['size'] > 500) {
      echo 'File Size Should Be Less Then 500kb';
      exit;
    }
  

  // Move the uploaded file
  $uploadResult = move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $_FILES['photo']['name']);

  if ($uploadResult) {
    echo 'File uploaded successfully!';
  } else {
    echo 'Error uploading file!';
  }
}
?>
</pre>

<form method="post" enctype="multipart/form-data" >
  <input type="file" name="photo">
  <input type="submit" name="submit" value="Submit">

</form>
  
</body>
</html>
