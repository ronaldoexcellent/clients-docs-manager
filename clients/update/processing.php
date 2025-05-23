<?php
    $target_dir = '../../assets/docs';
    $target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $_SESSION['errors'] = array();

    if (isset($_POST['update'])) {
        echo ucwords(basename($_FILES["file_to_upload"]["name"]));
        echo $fileType;

        echo dirname($_FILES["file_to_upload"]["name"]);
    }
    // echo 'checked';

    function updateMSGs($err) {
        array_push($_SESSION['errors'], $err);
        $_SESSION['messages'] = alert('error', $err);
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        updateMSGs("Sorry, file already exists.");
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file_to_upload"]["size"] > 2000000) {
        updateMSGs("File size should be 2MB or less.");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx" && $fileType != "xls" ) {
        updateMSGs("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        updateMSGs("Sorry, your record was not updated.");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
            updateMSGs("The records ". htmlspecialchars(basename($_FILES["file_to_upload"]["name"])). " have been updated.");
        } else {
            updateMSGs($err = "Sorry, there was an error updating the records.");
        }
    }
?>