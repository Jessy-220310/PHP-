<?php

if(isset($_POST['upload']))
{
    // folder path
    $target_dir = "uploads/";

    // uploaded file name
    $filename = basename($_FILES["myfile"]["name"]);

    // full file path
    $target_file = $target_dir . $filename;

    // move uploaded file to uploads folder
    if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file))
    {
        echo "File uploaded successfully!<br>";

        // Download link
        echo "<a href='download.php?file=".$filename."'>Download File</a>";
    }
    else
    {
        echo "Upload failed.";
    }
}

?>
