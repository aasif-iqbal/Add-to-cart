<?php
include "cdn.php";
include "database_connection.php";
include "nav.php";
require_once 'cart.php';

?>
<!-- http://bootstrap-ecommerce.com/bootstrap-ecommerce-html/page-shopping-cart.html -->
<div class="container" style="margin-top: 100px;">
<div class="row">
	<aside class="col-lg-9">

<div class="card">
<?php
if (isset($_SESSION['product_1'])) {
	echo ("Item:" . $_SESSION['product_1']);
}

?>
<div class="table-responsive">
<?php displayMessage();?>
<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <!-- <th scope="col" class="text-right d-none d-md-block" width="200">Remove</th> -->
</tr>
</thead>

<tbody>
	<?php display_cart();?>
<tr>
	<td>
		<figure class="itemside align-items-center">
			<div class="aside"><img src="image/w2.jpeg" class="img-sm" height="90"></div>
			<figcaption class="info">
				<a href="#" class="title text-dark">Solid Round Neck T-Shirt</a>
				<p class="text-muted small">Brand: Jack & Jones <br> Size: M</p>
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
	<td>
		<figure class="itemside align-items-center">
			<div class="aside"><img src="image/p1.jpg" class="img-sm" height="90"></div>
			<figcaption class="info">
				<a href="#" class="title text-dark">ADATA Premier ONE microSDXC</a>
				<p class="text-muted small">Size: 256 GB  <br> Brand: ADATA </p>
			</figcaption>
		</figure>
	</td>
	<td>
		<a  href="" class="btn btn-light" data-toggle="tooltip">
<svg width="1.1em" height="1.1em" viewBox="0 0 16 16" class="bi bi-cart-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M6 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
</svg>
</a>
<label class="">3</label>
		<a href="" class="btn btn-light btn-round">
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
	<a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>
	<a href="" class="btn btn-light btn-round"> Remove</a>
	</td>
</tr>
<tr>
	<td>
		<figure class="itemside align-items-center">
			<div class="aside"><img src="image/p2.jpeg" class="img-sm" height="90"></div>
			<figcaption class="info">
				<a href="#" class="title text-dark">Gamepad Sony DualShock 4</a>
				<p class="small text-muted">Version: CUH-ZCT2E  <br> Brand: Sony</p>
			</figcaption>
		</figure>
	</td>
	<td>
		<a  href="" class="btn btn-light" data-toggle="tooltip">
<svg width="1.1em" height="1.1em" viewBox="0 0 16 16" class="bi bi-cart-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M6 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
</svg>
</a>
<label class="">3</label>
		<a href="" class="btn btn-light btn-round">
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
		<a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
</svg></i></a>
		<a href="" class="btn btn-light btn-round"> Remove</a>
	</td>
</tr>
</tbody>


</table>
<!-- <h2 class="text-center">No Product Found</h2> -->
</div> <!-- table-responsive.// -->



</div> <!-- card.// -->




	</aside> <!-- col.// -->
	<aside class="col-lg-3">

<div class="card mb-3">
<div class="card-body">
<form>
	<div class="form-group">
		<label>Have coupon?</label>
		<div class="input-group">
			<input type="text" class="form-control" name="" placeholder="Coupon code">
			<span class="input-group-append">
				<button class="btn btn-primary">Apply</button>
			</span>
		</div>
	</div>
</form>
</div> <!-- card-body.// -->
</div> <!-- card.// -->

<div class="card">
<div class="card-body">
		<dl class="dlist-align">
		  <dt>Total price:</dt>
		  <dd class="text-right">Rs. 3900.00</dd>
		</dl>
		<dl class="dlist-align">
		  <dt>Discount:</dt>
		  <dd class="text-right text-danger">Rs. 1190.00</dd>
		</dl>
		<dl class="dlist-align">
		  <dt>Total:</dt>
		  <dd class="text-right text-dark b"><strong>Rs. 1490.00</strong></dd>
		</dl>
		<hr>
		<p class="text-center mb-3">
			<img src="image/payments.png" height="26">
		</p>
		<a href="#" class="btn btn-primary btn-block"> Make Payment </a>
		<a href="#" class="btn btn-light btn-block">Continue Shopping</a>
</div> <!-- card-body.// -->
</div> <!-- card.// -->
<div class="card-body alert alert-secondary border-top my-3">
	<p class="icontext"><i class="icon text-dark fa fa-truck"></i> <strong>Get free delivery
	</strong>for every order above Rs. 899</p>
</div> <!-- card-body.// -->
	</aside> <!-- col.// -->
</div> <!-- row.// -->
</div>
