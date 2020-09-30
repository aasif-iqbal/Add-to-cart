<?php
include "cdn.php";
include "database_connection.php";

if (isset($_GET['add'])) {
	global $connection;
	$query = "SELECT * FROM tbl_products WHERE product_id=" . escape_string($_GET['add']) . " ";
	confirmation($query);
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

	foreach ($result as $row) {
		$product_quantity = $row['product_quantity'];

		if ($product_quantity != $_SESSION['product_' . $_GET['add']]) {
			$_SESSION['product_' . $_GET['add']] += 1;
			header("Location:checkout.php");
		} else {
			setMessage("Sorry..! Only " . $row['product_quantity'] . " " . $row['product_name'] . " " . " available");
			header("Location:checkout.php");
		}
	}
} else {
	echo ("<h1>Not Set 1</h1>");
}

if (isset($_GET['remove'])) {

	$_SESSION['product_' . $_GET['remove']]--;
	echo ($_SESSION['product_' . $_GET['remove']]);
	if ($_SESSION['product_' . $_GET['remove']] < 1) {
		header("Location:checkout.php");
	} else {
		header("Location:checkout.php");
	}
}

if (isset($_GET['delete'])) {
	$_SESSION['product_' . $_GET['delete']] = 0;
	header("Location:checkout.php");
}

function display_cart() {
	global $connection;
	//$query = "SELECT * FROM tbl_products WHERE product_id=" . escape_string($_GET['add']) . " ";
	$query = "SELECT * FROM tbl_products";
	confirmation($query);
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

	foreach ($result as $row) {
		$product_image = display_image($row['product_image']);
		$brand_name = show_product_brand_name($row['product_brand_id']);
		$product_id = $row['product_id'];
		$product_in_cart = <<<DELIMETER
<tr>
	<td>
		<figure class="itemside align-items-center">
			<div class="aside"><img src="{$row['product_image']}" class="img-sm" height="90"></div>
			<figcaption class="info">
				<a href="#" class="title text-dark">{$row['product_name']}</a>
				<p class="text-muted small">Brand: {$brand_name} <br> Size:{$row['product_size']} </p>
			</figcaption>
		</figure>
	</td>
	<td>

<a  href="cart.php?remove=1" class="btn btn-light" data-toggle="tooltip">
<svg width="1.1em" height="1.1em" viewBox="0 0 16 16" class="bi bi-cart-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M6 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
</svg>
</a>
<label>3</label>
		<a href="cart.php?add=1" class="btn btn-light btn-round">
		<svg width="1.1em" height="1.1em" viewBox="0 0 16 16" class="bi bi-cart-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>
		</a>

	</td>
	<td>
		<div class="price-wrap">

      <span class="mt-2 text-success">Rs.1490</span>
      <small><span class="mt-2 text-secondary"><s>Rs.3900</s></span></small>
      <small><span class="mt-2 text-warning">(20%OFF)</span></small>

		</div>
	</td>
	<td class="text-right d-none d-md-block">
	<a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart text-danger"></i></a>

	<a href="cart.php?delete=1" class="btn btn-light"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></a>
	</td>
</tr>
<tr>
DELIMETER;
		echo ($product_in_cart);
	}

}

// if (isset($_GET['add'])) {
// 	$_SESSION['product_' . $_GET['add']] += 1;
// 	echo ($_SESSION['product_' . $_GET['add']]);
// } else {
// 	echo ("<h1>Not getting data</h1>");
// }
?>