<?php
session_start();
error_reporting(0);

global $addbal_msg;
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
  	$uid=$_SESSION['detsuid'];
    $value = $_POST['value'];
    $for = $_POST['for'];

    $query=mysqli_query($con, "INSERT INTO tb_bal (uid, bal_value, bal_for, date_time) value ('$uid', '$value', '$for', now())");
if($query){
$addbal_msg = '<div class="alert alert-success" id="success-alert">
					New balance has been added.</div>' ; 
} else {
$addbal_msg = '<div class="alert alert-danger">
					Something went wrong, please try again.</div>' ; 
}
  
}
  ?>


<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Add balance</li>
				
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Add balance</div>
					<?php echo $addbal_msg;?>
					<div class="panel-body">
				
						<div class="col-md-12">
							
							<form role="form" method="post" action="">
								<div class="form-group">
									<label>Value</label>
									<input type="number" class="form-control" name="value" value="" required="true">
								</div>
								
								<div class="form-group">
									<label>Description (optional)</label>
									<input class="form-control" type="text" value="" name="for">
								</div>
																

								<div class="form-group has-success">
									<button type="submit" class="btn btn-success" name="submit">Submit</button>
								</div>
		
								</div>
								
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php include_once('includes/footer.php');?>
		</div><!-- /.row -->
	</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
<script type="text/javascript">
        $("#success-alert").show();
        setTimeout(function() { $("#success-alert").hide(); }, 5000);
 </script>
	
</body>
</html>
<?php }  ?>