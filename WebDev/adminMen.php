<?php

@include 'config.php';

if (isset($_SESSION['user_id'])) {
   // User is already logged in, redirect to appropriate page
   if ($_SESSION['user_email'] === 'admin@email.com') {
      header('location: adminMen.php');
      exit();
   } else {
      header('location: adminMen.php');
      exit();
   }
}

if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   // Check if the user is an admin
   if ($email === 'admin@email.com' && $password === 'admin123') {
      $_SESSION['user_id'] = 'admin';
      $_SESSION['user_email'] = $email;
      header('location: adminMen.php');
      exit();
   } else {
      // Perform user login validation
      $query = "SELECT * FROM 'admin' WHERE email='$email' AND password='$password'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_assoc($result);
         $_SESSION['user_id'] = $row['id'];
         $_SESSION['user_email'] = $row['email'];

         // Redirect to appropriate page based on user role
         if ($row['role'] === 'admin') {
            header('location: adminMen.php');
         } else {
            header('location: adminMen.php');
         }
         exit();
      } else {
         $error = "Invalid email or password";
      }
   }
}

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'IMG/'.$p_image;
   $category = $_POST['p_category'];

   $insert_query = mysqli_query($conn, "INSERT INTO `$category`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'Product is succesfully added!';
   }else{
      $message[] = 'could not add the product';
   }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">

<section>
   <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
      <h3>Add a new product</h3>
      <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
      <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
      <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
      <select name="p_category" class="box" required>
         <option value="mens_products">Mens Products</option>
         <option value="women_products">Women Products</option>
         <option value="kids_products">Kids Products</option>
      </select>

      <input type="submit" value="Add the product" name="add_product" class="btn">
   </form>
</section>






</div>















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>