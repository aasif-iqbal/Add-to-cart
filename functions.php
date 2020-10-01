<?php
ob_start(); //output_buffer

session_start();
include 'database_connection.php';
//include 'cart.php';
//echo "function";
function setMessage($message) {

	if (!empty($message)) {
		$_SESSION['message'] = $message;
	} else {
		$message = "";
	}
}

function displayMessage() {

	if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
		echo ("<div class='alert alert-danger w-70 text-center' role='alert' id='message'>");
		echo ($_SESSION['message']);
		unset($_SESSION['message']);
		echo ("</div>");
	}
}

function redirect($location) {
	header("Location:$location");
}

function confirmation($result) {

	global $connection;
	if (!$result) {
		die("Query failed:" . mysqli_error($connection));
	}
}

function escape_string($string) {

	global $connection;

	return mysqli_real_escape_string($connection, $string);

}

function fetch_array($result) {

	return mysqli_fetch_array($result);
}

function display_image($picture) {

	global $upload_directory;

	return $upload_directory . DS . $picture;

}

function show_product_brand_name($product_brand_id) {
	global $connection;

	$query = "SELECT * FROM `tbl_brands` WHERE brand_id = '$product_brand_id' ";
	confirmation($query);
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

	foreach ($result as $row) {

		return $row['brand_name'];
	}
}

//display_product in product page
function display_product() {
	global $connection;

	$query = "SELECT * FROM `tbl_products`";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

	foreach ($result as $row) {
		$product_image = display_image($row['product_image']);
		$brand_name = show_product_brand_name($row['product_brand_id']);
		$product_id = $row['product_id'];

		$product = <<<DELIMETER
		  <div class="card mx-4 my-4" style="width: 18rem;">
  <img class='mx-auto'  src="{$row['product_image']}" width="auto" height="auto" />
  <div class="card-body">
  <h5 class="card-title text-muted">{$brand_name}</h5>
    <h6 class="card-subtitle">{$row['product_name']}</h6>
    <div class="price">
      <span class="mt-2 text-success">Rs.{$row['product_actual_price']}</span> &nbsp;
      <span class="mt-2 text-secondary"><s>Rs.{$row['product_mrp']}</s></span> &nbsp;
      <span class="mt-2 text-warning">({$row['product_discount']}%OFF)</span>
    </div>
<a class="nav-link" href="cart.php?add={$product_id}">
<button type="button" class="btn btn-outline-dark btn-sm btn-block">ADD TO BAG</button></a>
  </div>
</div>
DELIMETER;
		echo ($product);
	}
}

?>