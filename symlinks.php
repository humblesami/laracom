<?php
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';

$public_folder_path = "";
$is_sub_str = $_SERVER['SERVER_PORT'];
if($is_sub_str == 80)
    $public_folder_path = "public/";
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/'.$public_folder_path.'storage';
symlink($targetFolder,$linkFolder);
echo "Success";