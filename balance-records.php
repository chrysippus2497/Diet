<?php
session_start();
error_reporting(0);


include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_GET['delid']))
{
$rowid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from tb_bal where ID ='$rowid'");

if($query){

	$msg = '<div class="alert alert-success" id="success-alert">
			Balance has been deleted.
			</div>';
} else {

	$msg = '<div class="alert alert-success">
			Something went wrong, please try again.
			</div>';

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
				<li class="active">Balance</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Balance</div>
					<div class="panel-body">
					<?php echo $msg; ?>
					<div class="col-md-12">
							
		<div class="table-responsive">
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Value</th>
                  <th>Description</th>
                  <th>Deposit Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              $userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select * from tb_bal where uid='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
              
                  <td>₱ <?php  echo $row['bal_value'];?></td>
                  <td><?php  echo $row['bal_for'];?></td>
                  <td><?php  echo $row['date_time'];?></td>
                  <td>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"<?php $rowid = $row['ID']; ?>>
                  Delete
                  </button>
              	  </td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
               
              </tbody>
            </table>

             <!-- Delete Modal -->
			 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				  <div class="modal-content">
				  <div class="modal-header">
				     <h3 class="modal-title" id="exampleModalLongTitle">Balance record</h3>
				   	 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				     <span aria-hidden="true">&times;</span>
				     </button>
				  </div>
				  <div class="modal-body">
				  	
				  		<h4>Are you sure?</h4>
				        <p>this action cannot be undone.</p>

				  </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nevermind</button>

				     
				        <button type="button" class="btn btn-danger" onclick="window.location.href='balance-records.php?delid=<?php echo $rowid?>';"
				        >Yes
				        </button>
				        

				      </div>
				  </div>
				  </div>
			 </div>
			 <!-- Delete Modal -->


         					</div>
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