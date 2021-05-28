<?php

function uploader($file,$dir,$folder)
{
    $to = '';
    $file_type = $_FILES[$file]['type'];
    $allowed = array('image/jpeg','image/gif','image/png');

    if(!in_array($file_type,$allowed))
    {
        echo 'Only jpg, gif, and png files are allowed.';
    }
    else
    {
        $file_name = $_FILES[$file]['name'];
        mkdir($dir.$folder);
        $array = explode(".",$file_name);
        $extention = end($array);
        $new_name = rand().".".$extention;
        $from = $_FILES[$file]['tmp_name'];
        $to = $dir.$folder."/".$new_name;
        move_uploaded_file($from,$to);
    }

    return array($new_name,$to);
}

