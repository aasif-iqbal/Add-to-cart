<?php
include "cdn.php";
include "database_connection.php";
include "nav.php";
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
<div class="container-field" style="margin-top: 60px; margin-left: 50px;">
	<div id="loader"></div>
		<div class="row">
			<?php displayMessage();?>
  			<?php display_product();?>
		</div>
</div>
<script type="text/javascript">
window.onload = function() {
    document.getElementById('loader').style.display = "none";
}
</script>
