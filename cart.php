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
}

if (isset($_GET['remove'])) {

	$_SESSION['product_' . $_GET['remove']]--;

	if ($_SESSION['product_' . $_GET['remove']] < 1) {

		//unset if you remove all item in cart
		unset($_SESSION['item_total']);
		unset($_SESSION['item_quantity']);
		unset($_SESSION['total_mrp']);
		unset($_SESSION['total_discount']);

		header("Location:checkout.php");
	} else {
		header("Location:checkout.php");
	}
}

if (isset($_GET['delete'])) {
	$_SESSION['product_' . $_GET['delete']] = 0;

	//unset if you delete all item in cart
	unset($_SESSION['item_total']);
	unset($_SESSION['item_quantity']);
	unset($_SESSION['total_mrp']);
	unset($_SESSION['total_discount']);

	header("Location:checkout.php");
}

function display_cart() {
	global $connection;

	$total_price = 0;
	$item_quantity = 0;
	$total_mrp = 0;
	$total_discount = 0;

	foreach ($_SESSION as $productInCart => $value) {

		if ($value > 0) {

			if (substr($productInCart, 0, 8) == "product_") {

				$length = strlen(is_numeric($productInCart) - 8);
				$id = substr($productInCart, 8, $length); //session_id

				$query = "SELECT * FROM tbl_products WHERE product_id=" . escape_string($id) . " ";

				confirmation($query);
				$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
				foreach ($result as $row) {
					$product_image = display_image($row['product_image']);
					$brand_name = show_product_brand_name($row['product_brand_id']);
					$product_id = $row['product_id'];
					$product_actual_price = $row['product_actual_price'];
					$product_price = $product_actual_price * $value;
					$total_price += $product_price;

					$item_quantity += $value;

					$product_mrp = $row['product_mrp'];
					$product_mrp = $product_mrp * $value;
					$total_mrp += $product_mrp;
					$product_in_cart = <<<DELIMETER
<tbody>
<tr>
	<td>
		<figure class="itemside align-items-center">
			<div class="aside"><img src="{$row['product_image']}" class="img-sm" width="150" height="150"></div>
			<hr>
			<a class="btn btn-light text-muted" href="cart.php?delete=$id" role="button"><small>REMOVE</small></a>
			<button type="button" class="btn btn-light text-muted"><small>WISHLIST</small></button>
		</figure>
	</td>
	<td>
	<figcaption class="info">
				<a class="title text-dark">{$row['product_name']}</a>
				<p class="text-muted small">Brand: {$brand_name} <br>
				Size:{$row['product_size']} </p>
			</figcaption>
	</td>
	<td>

<a  href="cart.php?remove=$id" class="btn btn-light" data-toggle="tooltip">
<svg width="1.1em" height="1.1em" viewBox="0 0 16 16" class="bi bi-cart-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M6 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
</svg>
</a>
<label>{$value}</label>
		<a href="cart.php?add=$id" class="btn btn-light btn-round">
		<svg width="1.1em" height="1.1em" viewBox="0 0 16 16" class="bi bi-cart-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>
		</a>

	</td>

	<td>
		<div class="price-wrap">
      <span class="mt-2 text-success">Rs.{$product_actual_price}</span>
      <small><span class="mt-2 text-secondary"><s>Rs.{$row['product_mrp']}</s></span></small>
      <small><span class="mt-2 text-warning">({$row['product_discount']}%OFF)</span></small>
		</div>
	</td>
</tr>
<tr>
</tbody>

DELIMETER;
					echo ($product_in_cart);

				}

				$_SESSION['total_mrp'] = $total_mrp;
				$_SESSION['item_quantity'] = $item_quantity;
				$_SESSION['item_total'] = $total_price;
				$temp_mrp_total = $_SESSION['total_mrp'];
				$temp_item_total = $_SESSION['item_total'];
				$total_discount = $temp_mrp_total - $temp_item_total;
				$_SESSION['total_discount'] = $total_discount;

			}
		}
	}
	if ($item_quantity == 0) {
		echo ("<img src='image/empty_cart.png'>");
	}
}
?>