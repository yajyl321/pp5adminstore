<?php include './database/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SariSari</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="./index.php">
    <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="logo">
    Bootstrap
  </a>
</nav>

<div class="row mx-3 my-3">
  <div class="col-sm-4 "><a href="./sales.php">Sales</a></div>
  <div class="col-sm-4"><a href="./stocks.php">Stocks</a></div>
  <div class="col-sm-4"><a href="./input.php">Input</a></div>
</div>