<?php
include "cdn.php";
include "database_connection.php";
include "nav.php";
require_once 'cart.php';
?>
<style type="text/css">
#loader{
	position: fixed;
	width: 100%;
	height: 100vh;
	background: #fff
	url('image/loader_image.gif') no-repeat center;
	z-index: 99999;
}
</style>
<body>
<div class="container" style="margin-top: 100px;">
	<div id="loader"></div>
	<?php displayMessage();?>
<div class="row">
	<aside class="col-lg-9">

<div class="card">

<div class="table-responsive">

<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
</tr>
</thead>
	<?php display_cart();?>
</table>
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
				<button class="btn btn-info">Apply</button>
			</span>
		</div>
	</div>
</form>
</div> <!-- card-body.// -->
</div> <!-- card.// -->
<div class="card">
<div class="card-body">
	<p class="text-muted"><strong><small>PRICE DETAILS(<?php
echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0"; ?>&nbsp;item)</small></strong></p>
		<dl class="dlist-align">
		  <dt>Total price:</dt>
		  <dd class="text-right">Rs. <?php echo isset($_SESSION['total_mrp']) ? $_SESSION['total_mrp'] : $_SESSION['total_mrp'] = "0"; ?>
		  	</dd>
		</dl>
		<dl class="dlist-align">
		  <dt>Discount:</dt>
		  <dd class="text-right text-danger">- Rs. <?php echo isset($_SESSION['total_discount']) ? $_SESSION['total_discount'] : $_SESSION['total_discount'] = "0"; ?></dd>
		</dl>
		<dl class="dlist-align">
		  <dt>Total:</dt>
		  <dd class="text-right text-dark b"><strong>Rs.
<?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>
		  </strong></dd>
		</dl>
		<hr>
		<p class="text-center mb-3">
			<img src="image/payments.png" height="26">
		</p>
		<a href="#" class="btn btn-info btn-block"> Make Payment </a>
		<a href="#" class="btn btn-light btn-block">Continue Shopping</a>
		<p class="text-center text-uppercase text-muted my-3"><small><i class="fa fa-shield" aria-hidden="true"></i>&nbsp;safe and secure payment</small></p>
</div>
</div>
<div class="card-body alert alert-secondary border-top my-3">
	<p class="icontext"><i class="icon text-dark fa fa-truck"></i> <strong>Get free delivery
	</strong>for every order above Rs. 899</p>
</div> <!-- card-body.// -->
	</aside> <!-- col.// -->
</div> <!-- row.// -->
</div>
</body>
<script type="text/javascript">
			//hide message after 3sec
	    setTimeout(function() {
	       document.getElementById("message").style.display = 'none';
	    }, 4000);
	    //for loader
	    window.onload = function() {
    document.getElementById('loader').style.display = "none";
}
</script>