<?php include './database/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SariSari</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-light bg-light shadow-sm mb-4">
  <a class="navbar-brand d-flex align-items-center" href="./index.php">
    <i class="fa-solid fa-shop fs-4"></i>
    <span class="font-weight-bold text-primary italic mx-2 fs-4">J-Store Admin</span>
  </a>
</nav>


<div class="container">
  <div class="row g-4 mx-3 my-3">
  
    <div class="col-sm-4">
      <div class="border border-primary rounded text-uppercase text-center p-4 bg-light shadow-sm">
        <a href="./sales.php" class="text-decoration-none text-primary font-weight-bold">Sales</a>
      </div>
    </div>
    
    
    <div class="col-sm-4">
      <div class="border border-primary rounded text-uppercase text-center p-4 bg-light shadow-sm">
        <a href="./stocks.php" class="text-decoration-none text-primary font-weight-bold">Stocks</a>
      </div>
    </div>

    
    <div class="col-sm-4">
      <div class="border border-primary rounded text-uppercase text-center p-4 bg-light shadow-sm">
        <a href="./input.php" class="text-decoration-none text-primary font-weight-bold">Input</a>
      </div>
    </div>
  </div>
</div>

<main>