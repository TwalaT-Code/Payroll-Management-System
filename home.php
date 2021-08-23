<?php
include("header.php"); 
include("db_connect.php");
?>
<style>
   body{
	   background-image:url("assets/img/payroll-cover.jpg");
	   background-repeat: no-repeat;
	   background-size: cover;
   }
</style>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
                <div class="card">
                    <div class="card-body"><u>
                    <?php echo "Welcome back ". $_SESSION['login_name']."!" ?>
					</u>
                                        
                    </div>
                    
                </div>
				<div>
					<marquee><h3>A better way to manage ur employees and their payroll.</h3></marquee>
				</div>
            </div>
	</div>
</div>
<footer>
<div id="footer">
<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed By TT BRANDS INK (PTY)LTD</p>
</div>
</footer>
<script>
	
</script>