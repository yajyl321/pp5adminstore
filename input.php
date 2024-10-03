<?php include 'inc/header.php'; ?>


<?php
// Set vars to empty values
$name = $price = $stocks = $type = $image = '';
$nameErr = $priceErr = $stocksErr = $typeErr = $imageErr = '';


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
        $stocks = filter_input(INPUT_POST, 'stocks', FILTER_VALIDATE_INT);
    }

   // Validate type
   if (empty($_POST['type'])) {
    $typeErr = '';
  } else {
    $type = filter_input(INPUT_POST, 'type');
  }

    // Validate image
    if (empty($_POST['image'])) {
      $imageErr = '';
    } else {
      $image = filter_input(INPUT_POST, 'image');
    }

    // Check for errors
    if (empty($nameErr) && empty($priceErr) && empty($stocksErr)) {
        // Add to database
        $sql = "INSERT INTO `store-items` (name, price, stocks, type, image) VALUES ('$name', '$price', '$stocks', '$type', '$image')";

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

<div class="container">
    <div class="card mx-auto my-4 shadow-sm" style="max-width: 600px;">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <!-- Card Header -->
            <h5 class="card-header bg-primary text-white text-center">SariSari Item</h5>
            
            <!-- Card Body -->
            <div class="card-body">

            <!-- Type of item -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Select Type of Item</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="type" >
                    <option value="Food">Food</option>
                    <option value="Beverage">Beverages</option>
                    <option value="Misc">Misc</option>
                </select>
            </div>
            
            <!-- Item Name -->
            <div class="form-group my-3">
                <label for="name" class="form-label font-weight-bold">Name</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Enter item name" value="<?php echo htmlspecialchars($name); ?>" required />
            </div>
            
            <!-- Price -->
            <div class="form-group my-3">
                <label for="price" class="form-label font-weight-bold">Price</label>
                <input class="form-control" type="number" id="price" name="price" placeholder="Enter price" value="<?php echo htmlspecialchars($price); ?>" required />
            </div>
            
            <!-- Stocks -->
            <div class="form-group my-3">
                <label for="stocks" class="form-label font-weight-bold">Stocks</label>
                <input class="form-control" type="number" id="stocks" name="stocks" placeholder="Enter stock quantity" value="<?php echo htmlspecialchars($stocks); ?>" required />
            </div>
            
            <!-- Upload Image -->
            <div class="form-group my-3">
                <label for="file" class="form-label font-weight-bold">Upload Image</label>
                <input type="file" class="form-control" id="file" name="image" accept=".jpeg, .jpg" value="<?php echo htmlspecialchars($image); ?>"/>
            </div>

            <!-- Submit Button -->
            <div class="d-grid gap-2">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary w-100 py-2" />
            </div>
            </div>
        </form>
    </div>
</div>


</main>

<?php include 'inc/footer.php'; ?>
