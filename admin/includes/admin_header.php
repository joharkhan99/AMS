<?php session_start(); ?>
<?php ob_start(); ?>
<?php include "../db.php" ?>
<?php include "functions.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- custom styles -->
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <title>Admin</title>
</head>

<body>