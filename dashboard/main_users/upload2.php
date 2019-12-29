<?php
if (!isset($_SESSION))
  session_start();
?>
<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>

<?php
  if(isset($_POST["submit"]))
  {
    $file = $_FILES['file'];
    print_r($file);
    $fileName = $_FILES['icon_file']['name'];
    $fileTmpName = $_FILES['icon_file']['tmp_name'];

    $fileSize = $_FILES['icon_file']['size'];
    $fileError = $_FILES['icon_file']['error'];
    $fileType = $_FILES['icon_file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf' );

    if(in_array($fileActualExt,$allowed))
    {
        if($fileError ===0)
        {
          if($fileSize < 1000000)
          {
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            header("Location:profile.php?uploadsucess");
          }else
          {
            echo "Your file is too big!";
          }
        }else
        {
          echo "There was an error uploading your file!";
        }
    }else {
      echo "You cannot upload of this type!";
    }
  }
