<?php include 'inc/header.php' ?>

<?php 

$sql = 'SELECT * FROM `store-sale`';
$result = mysqli_query($conn, $sql);
$store = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!-- validate to see if there is an item -->
<?php if (empty($store)): ?>
  <p class="lead text-center mt-3">No item</p>
<?php endif; ?>

</main>

<?php include 'inc/footer.php' ?>