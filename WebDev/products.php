<?php
include 'config.php';

// Fetch products from men_products table
$men_products_query = mysqli_query($conn, "SELECT * FROM mens_products") or die('Men Products Query Failed');

// Fetch products from women_products table
$women_products_query = mysqli_query($conn, "SELECT * FROM women_products") or die('Women Products Query Failed');

// Fetch products from kids_products table
$kids_products_query = mysqli_query($conn, "SELECT * FROM kids_products") or die('Kids Products Query Failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin - View Products</title>
   <link rel="stylesheet" href="admin.css">
   <style>
      /* Your custom styles for the view products page */
   </style>
</head>
<body>
   <?php include 'header.php'; ?>

   <h1>View Products</h1>

   <h2>Men Products</h2>
   <?php if (mysqli_num_rows($men_products_query) > 0) { ?>
      <table>
         <!-- Table structure and headers for displaying men products -->
         <thead>
            <tr>
               <th>Product ID</th>
               <th>Name</th>
               <th>Price</th>
               <th>Image</th>
               <!-- Add more columns as needed for additional product details -->
            </tr>
         </thead>
         <tbody>
            <?php while ($row = mysqli_fetch_assoc($men_products_query)) { ?>
               <!-- Display men product details in table rows -->
               <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo $row['image']; ?></td>
                  <!-- Add more cells as needed for additional product details -->
               </tr>
            <?php } ?>
         </tbody>
      </table>
   <?php } else { ?>
      <p>No men products found.</p>
   <?php } ?>

   <!-- Repeat the above code structure for women and kids products -->
   <!-- Replace the table structure and query variable names accordingly -->

   <h2>Women Products</h2>
   <?php if (mysqli_num_rows($women_products_query) > 0) { ?>
      <table>
         <!-- Table structure and headers for displaying women products -->
         <thead>
            <tr>
               <th>Product ID</th>
               <th>Name</th>
               <th>Price</th>
               <th>Image</th>
               <!-- Add more columns as needed for additional product details -->
            </tr>
         </thead>
         <tbody>
            <?php while ($row = mysqli_fetch_assoc($women_products_query)) { ?>
               <!-- Display women product details in table rows -->
               <tr>
                  <td><?php echo $row['Id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo $row['image']; ?></td>
                  <!-- Add more cells as needed for additional product details -->
               </tr>
            <?php } ?>
         </tbody>
      </table>
   <?php } else { ?>
      <p>No women products found.</p>
   <?php } ?>

   <h2>Kids Products</h2>
   <?php if (mysqli_num_rows($kids_products_query) > 0) { ?>
      <table>
         <!-- Table structure and headers for displaying kids products -->
         <thead>
            <tr>
               <th>Product ID</th>           
               <th>Name</th>
               <th>Price</th>
               <th>Image</th>
               <!-- Add more columns as needed for additional product details -->
            </tr>
         </thead>
         <tbody>
            <?php while ($row = mysqli_fetch_assoc($kids_products_query)) { ?>
               <!-- Display kids product details in table rows -->
               <tr>
                  <td><?php echo $row['Id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo $row['image']; ?></td>
                  <!-- Add more cells as needed for additional product details -->
               </tr>
            <?php } ?>
         </tbody>
      </table>
   <?php } else { ?>
      <p>No kids products found.</p>
   <?php } ?>

</body>
</html>
