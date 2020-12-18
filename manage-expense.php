  <?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

//code deletion
if(isset($_GET['delid']))
{
$rowid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from tblexpense where ID='$rowid'");
if($query){

	$msg = '<div class="alert alert-success" id="success-alert">
			Expense has been deleted.
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
				<li class="active">Expense</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Expense</div>
					<div class="panel-body">
					<?php echo $msg; ?>
						<div class="col-md-12">
							
							<div class="table-responsive">


            <table id="datatableid" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

              <thead>
                <tr>
                  <th class="th-sm">S.NO</th>
                  <th class="th-sm">Expense Item</th>
                  <th class="th-sm">Expense Cost</th>
                  <th class="th-sm">Expense Date</th>
                  <th class="th-sm">Action</th>
                </tr>
              </thead>
              <?php
              $userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select * from tblexpense where UserId='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
              	
                  <td><?php  echo $row['ExpenseItem'];?></td>
                  <td>₱ <?php  echo $row['ExpenseCost'];?></td>
                  <td><?php  echo $row['ExpenseDate'];?></td>
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
				     <h3 class="modal-title" id="exampleModalLongTitle">Expense record</h3>
				   	 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				     <span aria-hidden="true">&times;</span>
				     </button>
				  </div>
				  <div class="modal-body">

				  		<h4>Are you sure?</h4>
				        <p>this action cannot be undone.</p>

				  </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Nevermind</button>

				     
				        <button type="button" class="btn btn-primary" onclick="window.location.href='manage-expense.php?delid=<?php echo $rowid?>';"
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


<!-- Fade alert script -->
<script>
        $("#success-alert").show();
        setTimeout(function() { $("#success-alert").hide(); }, 5000);
 </script>
<!-- Fade alert script -->


<!-- sort table script -->
  <script>
  
  $(document).ready(function() {

    $('#datatableid').DataTable({
        "pagingtype": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -5],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records..",
        }
    });

});

</script>
 <!-- sort table script -->
	
</body>
</html>
<?php }  ?>