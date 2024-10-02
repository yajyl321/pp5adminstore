<?php include 'inc/header.php'; ?>


<?php
// Set vars to empty values
$name = $price = $stocks = '';
$nameErr = $priceErr = $stocksErr = '';

if (isset($_POST['submit'])) {
  // Validate name
  if (empty($_POST['name'])) {
    $nameErr = 'Name is required';
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  // Validate price
  if (empty($_POST['price'])) {
    $priceErr = 'Price is required';
  } else {
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  }

  // Validate stocks
  if (empty($_POST['stocks'])) {
    $stocksErr = 'Stocks is required';
  } else {
    $stocks = filter_input(INPUT_POST, 'stocks', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if (empty($nameErr) && empty($priceErr) && empty($stocksErr)) {
    // Add to database
    $sql = "INSERT INTO `store-items` (name, price, stocks) VALUES ('$name', '$price', '$stocks')";

    if (mysqli_query($conn, $sql)) {
      // success
      header('Location: input.php');
    } else {
      // Error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
}
?>

<div class="card mx-4 my-4">
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <h5 class="card-header">SariSariItem</h5>
    <div class="card-body">
      <!-- for input item -->
      <h5 class="card-title my-3"> Name </h5>
      <input class="form-control" type="text" id="name" name="name" placeholder="Default input" value="<?php echo htmlspecialchars($name); ?>" />
      
      <h5 class="card-title my-3"> Price </h5>
      <input class="form-control" type="number" id="price" name="price" placeholder="Default input" value="<?php echo htmlspecialchars($price); ?>" />
      
      <h5 class="card-title my-3"> Stocks </h5>
      <input class="form-control" type="number" id="stocks" name="stocks" placeholder="Default input" value="<?php echo htmlspecialchars($stocks); ?>" />
      
      <!-- for uploading images -->
      <div class="form-group my-3 py-3">
        <label for="exampleFormControlFile1">Upload file</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
      </div>

      <!-- Submit button -->
      <div class="mb-3">
        <input type="submit" name="submit" value="Submit" class="btn btn-dark w-100" />
      </div>
    </div>
  </form>
</div>

<?php include 'inc/footer.php'; ?>
