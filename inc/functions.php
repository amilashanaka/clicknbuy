<?php

function replaceArrayKey($array, $oldKey, $newKey)
{
    if (array_key_exists($oldKey, $array)) {
        $keys = array_keys($array);
        $keys[array_search($oldKey, $keys)] = $newKey;
        $array = array_combine($keys, $array);
    }
    return $array;
}


function uploaFile($file, $upload_dir)
{

    if (isset($_FILES[$file]) && $_FILES[$file]['error'] == UPLOAD_ERR_OK) {
        $allowed_types = array('application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        $file_name = $_FILES[$file]['name'];
        $file_type = $_FILES[$file]['type'];
        $file_tmp = $_FILES[$file]['tmp_name'];
        $file_size = $_FILES[$file]['size'];

        if (in_array($file_type, $allowed_types)) {
            if ($file_size <= 5242880) {
                // $upload_dir = 'uploads/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                $file_name = preg_replace("/[^a-zA-Z0-9\.\-_]/", "", $file_name); // Sanitize file name
                $file_path = $upload_dir . basename($file_name);
                if (move_uploaded_file($file_tmp, $file_path)) {
                    return $file_name ;
                } else {
                    return "Failed to move the uploaded file.";
                }
            } else {
                return "File is too large. Maximum file size is 5MB.";
            }
        } else {
            return "Invalid file type. Only PDF and DOC files are allowed.";
        }
    } else {
        return "No file uploaded or there was an upload error.";
    }
}





function uploadPic($file_name, $target_dir)
{



    if (($_FILES[$file_name]["name"]) != '') {
        $target_user_image = $target_dir . basename($_FILES[$file_name]["name"]);
        $uploadFileType_user_image = pathinfo($target_user_image, PATHINFO_EXTENSION);
        $newfilename_user_image = round(microtime(true)) . rand(1000, 9999) . '.' . $uploadFileType_user_image;

        if (basename($_FILES[$file_name]["name"]) != '') {
            if ($uploadFileType_user_image != "jpg" && $uploadFileType_user_image != "png" && $uploadFileType_user_image != "jpeg" && $uploadFileType_user_image != "gif" && $uploadFileType_user_image != "JPG" && $uploadFileType_user_image != "PNG" && $uploadFileType_user_image != "JPEG" && $uploadFileType_user_image != "GIF") {
                return '';
            } else {

                if (move_uploaded_file($_FILES[$file_name]["tmp_name"], $target_dir . $newfilename_user_image)) {

                    return  $newfilename_user_image;
                } else {

                    return '';
                }
            }
        }
    } else {

        return '';
    }
}


function getResizeImg($file, $target_dir, $width, $height)
{


    if (basename($_FILES[$file]["name"]) != '') {
        $pd_Main_img = reSize($_FILES[$file]['tmp_name'], $_FILES[$file]['name'], 1, $target_dir, $width, $height);
    }
    return $pd_Main_img;
}




// back ground functions image uploading 



function reSize($file, $var_file, $var_name, $folderPath, $targetWidth, $targetHeight)
{

    $sourceProperties = getimagesize($file);
    $fileNewName = time() . $var_name;

    $ext = pathinfo($var_file, PATHINFO_EXTENSION);

    $imageType = $sourceProperties[2];

    switch ($imageType) {


        case IMAGETYPE_PNG:
            $imageResourceId = imagecreatefrompng($file);
            $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $targetWidth, $targetHeight);
            imagepng($targetLayer, $folderPath . $fileNewName . "." . $ext);
            break;


        case IMAGETYPE_GIF:
            $imageResourceId = imagecreatefromgif($file);
            $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $targetWidth, $targetHeight);
            imagegif($targetLayer, $folderPath . $fileNewName . "." . $ext);
            break;


        case IMAGETYPE_JPEG:
            $imageResourceId = imagecreatefromjpeg($file);
            $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $targetWidth, $targetHeight);
            imagejpeg($targetLayer, $folderPath . $fileNewName . "." . $ext);
            break;


        default:
            echo "Invalid Image type.";
            exit;
            break;
    }

    $file_save_as =  $fileNewName . "." . $ext;


    move_uploaded_file($file, $folderPath . $file_save_as);

    return $file_save_as;
}

function imageResize($imageResourceId, $width, $height, $targetWidth, $targetHeight)
{




    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);


    return $targetLayer;
}



// Date and time functions ----------------------------------------------------

function printTime($date)
{
    try {

        $dateObject = new DateTime($date);
        return $dateObject->format("H:i:s");
 
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
}

function printDate($date)
{
    $ndate = date_create($date);


    return date_format($ndate, "d-m-Y");
}

function printDateTime($date)
{
    $ndate = date_create($date);

    return date_format($ndate, 'd-m-Y H:i:s');
}

function setExpDate($today, $days = 100)
{
    return date('d-m-Y H:i:s', strtotime($today . ' + ' . $days . 'days'));
}


//----------------------------------------------------------------


function calculateAge($birthdate) {
    // Create a DateTime object from the birthdate
    $birthDate = new DateTime($birthdate);
    // Get the current date
    $currentDate = new DateTime();
    // Calculate the difference between the current date and the birthdate
    $age = $currentDate->diff($birthDate);
    // Return the age in years
    return $age->y;
}