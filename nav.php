<?php
include "cdn.php";
?>
<style type="text/css">
	/*cart*/
	#lblCartCount {
		font-size: 12px;
		background: #DC143C;
		color: #fff;
		padding: 0 5px;
		vertical-align: top;
		margin-left: -10px;
	}
	.badge {
		padding-left: 9px;
		padding-right: 9px;
		padding-top: 9px;

		-webkit-border-radius: 9px;
		-moz-border-radius: 9px;
		border-radius: 10px;
	}
	#brand {
		font-family: 'Berkshire Swash';font-size: 30px;
	}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
	<div class="container">
		<a class="navbar-brand" href="index.php">
			<img src="image/pinnacle-cart.png" width="150" height="50">
		</a>

		<!-- links toggle -->
		<button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#links" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars"></i>
		</button>
		<!-- account toggle -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#account" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

			<a class="nav-link" href="" style="">
							<span>
								<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-handbag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M8 1a2 2 0 0 0-2 2v2h4V3a2 2 0 0 0-2-2zm3 4V3a3 3 0 1 0-6 0v2H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 0 0 1 0V6h4z"/>
								</svg>
								<span style="vertical-align: top;" class='badge' id='lblCartCount'>2</span>
							</span>
						</a>
				</button>

				<div class="collapse navbar-collapse" id="links">
					<ul class="navbar-nav mr-auto">

						<li class="nav-item">
							<!-- <a class="nav-link" href="#">Product</a> -->
						</li>


					</ul>
				</div>
				<div class="collapse navbar-collapse" id="account">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="checkout.php" style="">
							<span>
								<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-handbag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M8 1a2 2 0 0 0-2 2v2h4V3a2 2 0 0 0-2-2zm3 4V3a3 3 0 1 0-6 0v2H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 0 0 1 0V6h4z"/>
								</svg>
								<span style="vertical-align: top;" class='badge' id='lblCartCount'><?php
echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0"; ?></span>
							</span>
						</a></li>

						<li class="nav-item"><a class="nav-link" href="#">
							<svg width="1.7em" height="1.7em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  							<path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
							</svg>
						</a></li>
					</ul>
				</div>
			</div>
		</nav>
