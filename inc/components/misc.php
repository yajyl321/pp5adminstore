<?php 


$sql = 'SELECT * FROM `store-items` WHERE type = "Misc"';
$result = mysqli_query($conn, $sql);
$store = mysqli_fetch_all($result, MYSQLI_ASSOC);



?>

<!-- validate to see if there is an item -->
<?php if (empty($store)): ?>
  <p class="lead text-center mt-3">No item</p>
<?php endif; ?>


<!-- cards for the items -->

<div class="container">
    <div class="row g-3 mx-3 my-3">
        <?php foreach ($store as $item): ?>
            <div class="col-lg-3 col-md-4 col-sm-6"> 
                <div class="card h-100"> 
                    <img class="card-img-top" src="https://via.placeholder.com/200" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['name']; ?></h5>
                        <p class="card-text">Stocks: <?php echo $item['stocks']; ?></p>

                        <form action="" method="POST">
                            <input type="hidden" name="image_path" value="<?php echo $item['image']; ?>">
                            <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php
        if (isset($_POST['delete'])) {

            $filePath = $_POST['image_path'];
            $itemId = $_POST['item_id']; 

            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    echo " ";
                } else {
                    echo " ";
                }
            } else {
                echo " ";
                }
           
            // Delete from database
            $sql = "DELETE FROM `store-items` WHERE id = ?";
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param('i', $itemId); 

            if ($stmt->execute()) {
                echo " ";
            } else {
                echo "Error: " . $stmt->error; 
            }

            $stmt->close(); 
        }
        ?>
    </div>
</div>

