<?php
ob_start();
//error_reporting(-1);
require_once 'databconnect.php';
$upload_file = "Gallery/";
$upload_path = "Gallery/clubs/";
$thumb_path  = "Gallery/clubs/thumb/";


//If directory not exists , create new directory
if(!file_exists($thumb_path)){
	mkdir($upload_file);
	chmod($upload_file,0777);
}

//If directory not exists , create new directory
if(!file_exists($upload_path)){
	mkdir($upload_path);
	chmod($upload_path,0777);
}

//If directory not exists , create new directory
if(!file_exists($thumb_path)){
	mkdir($thumb_path);
	chmod($thumb_path,0777);
}

define('THUMBNAIL_IMAGE_MAX_WIDTH', 100);
define('THUMBNAIL_IMAGE_MAX_HEIGHT', 100);

?>

<?php 
if(isset($_POST["submit"])){
	
      $club_name = $_POST['club_name'];
	  $gallery_id =  $_POST['articleCategory'];
	  $club_details =  $_POST['club_details'];
	  $created_by =  $_POST['created_by'];
	  $club_id =  $_POST['club_id'];
	  $root = $_SERVER['DOCUMENT_ROOT'];
 
 
   //$descrption = test_input($text); 
   $club_details = $club_details; 

foreach ($_FILES["images"]["error"] as $key => $value) {
  
  $path = $_FILES['images']['name'][$key];
 
  if ($value == UPLOAD_ERR_OK) {
  //File type detection
      $ext = pathinfo($path, PATHINFO_EXTENSION);
  
  
   if($ext === "jpg" || $ext==="png" || $ext==="jpeg" || $ext==="JPEG"  ||$ext==="PNG"  ||$ext==="JPG"){
    $file_name = $_FILES["images"]["tmp_name"][$key];
    $file_size = $_FILES['images']['size'][$key];
 
    if (($file_size <= (1024*2000))){// 2MB
    $name = md5(microtime()).".".$ext;
   
    $thumb_name =  md5(microtime()).".".$ext;
    
    $full_name = $upload_path.$name;//orginal image source(image name)
    $thumb_full_name = $thumb_path.$thumb_name;//full path of thumnail image to be 
	
	 
    @move_uploaded_file($file_name,$full_name);
    generate_image_thumbnail($full_name, $thumb_full_name);
    @move_uploaded_file($thumbnail_name, $thumbnail_dest);

$club_id = uniqid(md5(rand(10,1000)));


  $query = "INSERT INTO `gallery_photos` (`id`, `image_path`, `gallery_id`,`thumbnails`, `hash_id`, `time_created`, `time_updated`)
           VALUES (NULL, '{$full_name}', '{$gallery_id}','{$thumb_full_name}', '{$club_id}', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";


        if((mysqli_query($db,$query))) {//$descr_id
		

            $last_id = $db->insert_id;
			
			
			$des_query = "INSERT INTO `creat_club` (`club_id`, `club_name`, `created_by`, `gallery_id`, `club_details`,  `photo_id`, `hash_id`, `time_created`, `time_updated`) 
			              VALUES (NULL,'$club_name','$created_by','$gallery_id', '$club_details', '$last_id', '$club_id', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			
            if (mysqli_query($db, $des_query)) {
				
                header("Location: add_clubs.php?id=" . $gallery_id);
            } else
			{
                echo "<script>
      alert('Error in Uploading Image!!!');
      window.location.href='add_clubs.php?id=" . $gallery_id . "';
      </script>";
      }
     }

    } else {
     $insert_error = true;
     break;
    }
   }
   else 
   {
    echo "<script>
      alert('File too large. File must be less than 2 megabytes(2MB).!!');
      window.location.href='add_clubs.php?id=".$gallery_id."';
      </script>";
   }
   }else 
   {
    echo "<script>
      alert('Wrong File Format Please Upload an Image...!!');
      window.location.href='add_clubs.php?id=".$gallery_id."';
      </script>";
    
   }
  
  }
  
  }

  
  else header("Location: add_clubs.php");
  
  //clean the entries
  function test_input($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING);
  	return $data;
  }


  //create a thumb nails
  function generate_image_thumbnail($source_image_path, $thumbnail_image_path)
  {
   list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
   switch ($source_image_type) {
    case IMAGETYPE_GIF:
     $source_gd_image = imagecreatefromgif($source_image_path);
     break;
    case IMAGETYPE_JPEG:
     $source_gd_image = imagecreatefromjpeg($source_image_path);
     break;
    case IMAGETYPE_PNG:
     $source_gd_image = imagecreatefrompng($source_image_path);
     break;
   }
   if ($source_gd_image === false) {
    return false;
   }
   $source_aspect_ratio = $source_image_width / $source_image_height;
   $thumbnail_aspect_ratio = THUMBNAIL_IMAGE_MAX_WIDTH / THUMBNAIL_IMAGE_MAX_HEIGHT;
   if ($source_image_width <= THUMBNAIL_IMAGE_MAX_WIDTH && $source_image_height <= THUMBNAIL_IMAGE_MAX_HEIGHT) {
    $thumbnail_image_width = $source_image_width;
    $thumbnail_image_height = $source_image_height;
   } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
    $thumbnail_image_width = (int) (THUMBNAIL_IMAGE_MAX_HEIGHT * $source_aspect_ratio);
    $thumbnail_image_height = THUMBNAIL_IMAGE_MAX_HEIGHT;
   } else {
    $thumbnail_image_width = THUMBNAIL_IMAGE_MAX_WIDTH;
    $thumbnail_image_height = (int) (THUMBNAIL_IMAGE_MAX_WIDTH / $source_aspect_ratio);
   }
   $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
   imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
   imagejpeg($thumbnail_gd_image, $thumbnail_image_path, 90);
   imagedestroy($source_gd_image);
   imagedestroy($thumbnail_gd_image);
   return true;
  }
?>