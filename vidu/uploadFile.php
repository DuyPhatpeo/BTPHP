<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php
   $uploadedImage = ""; // Variable to store image path for display

   if(isset($_FILES['image']) && $_FILES['image'] != NULL){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext = @strtolower(end(explode('.', $_FILES['image']['name'])));
      $expensions = array("jpeg", "jpg", "png");
      
      if(in_array($file_ext, $expensions) === false){
         $errors[] = "Please choose a JPEG or PNG file.";
      }
      if($file_size > 2097152){
         $errors[] = 'File size should be less than 2MB';
      }

      if(empty($errors) == true){
         $uploadDir = "D:/2_ToolCode/XAMPP/xampp/htdocs/BTPHP/image/";
         $filePath = $uploadDir . $file_name;
         move_uploaded_file($file_tmp, $filePath);
         echo "File uploaded successfully!";
         $uploadedImage = $filePath; // Set uploaded image path for display
      }
      else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
			
         <ul>
            <li>File name: <?php echo isset($_FILES['image']) ? $_FILES['image']['name'] : ''; ?>
            <li>File size: <?php echo isset($_FILES['image']) ? $_FILES['image']['size'] : ''; ?>
            <li>File type: <?php echo isset($_FILES['image']) ? $_FILES['image']['type'] : ''; ?>
         </ul>
      </form>

      <?php if ($uploadedImage): ?>
         <h3>Uploaded Image:</h3>
         <img src="<?php echo str_replace("D:/2_ToolCode/XAMPP/xampp/htdocs", "", $uploadedImage); ?>" alt="Uploaded Image" style="max-width: 300px; max-height: 300px;">
      <?php endif; ?>
      
   </body>
</html>
