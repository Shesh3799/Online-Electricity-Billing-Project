<?php
  session_start();
  if(!(isset($_SESSION["Uname"])))
  {
    ?>
    <script>
        window.open("index.php","_self");
    </script>
    <?php
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin :: Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Welcome Admin</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
        <div class="input-group-append">
         
            
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Add Staff</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="registeredu.php">
          <i class="fas fa-fw fa-table"></i>
          <span>All Connection Details</span></a>
        </li>
       <li class="nav-item active">
        <a class="nav-link" href="registered.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Registered Connection</span></a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="users.php">
          <i class="fas fa-fw fa-table"></i>
          <span>User Details</span></a>
        </li>
      <li class="nav-item active">
        <a class="nav-link" href="unit.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Change unit price</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="paid.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Paid Bills</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="pending.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Pending Bills</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <?php
                include '../dbms/dbconnection.php';
                $sql55="select count(sid) as cstaff from staff";
                $run55=mysqli_query($con,$sql55);
                $data55=mysqli_fetch_assoc($run55);
                ?>
                <div class="mr-5">Total staffs <?php echo $data55['cstaff'];?> </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="main.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <?php
                $sql56="select count(cid) as cuser from user";
                $run56=mysqli_query($con,$sql56);
                $data56=mysqli_fetch_assoc($run56);
                ?>
                <div class="mr-5">Total User <?php echo $data56['cuser'];?> </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="registered.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <?php
                $sql57="select count(conid) as ccon from connection";
                $run57=mysqli_query($con,$sql57);
                $data57=mysqli_fetch_assoc($run57);
                ?>
                <div class="mr-5">Total Connections <?php echo $data57['ccon'];?> </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <?php
                $sql58="select count(cid) as cbill from bills";
                $run58=mysqli_query($con,$sql58);
                $data58=mysqli_fetch_assoc($run58);
                ?>
                <div class="mr-5">Bills Generated <?php echo $data58['cbill'];?> </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

       
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Present Staff Details</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <?php
                $sql101="select * from admin";
                $run101=mysqli_query($con,$sql101);
                $data101=mysqli_fetch_assoc($run101);
                ?>
                  <tr>
                  	<th>Staff ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of birth</th>
                    <th>Contact</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th> </th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                     <th class="p-3"></th>
                    <th class="p-3"></th>
          <th class="p-3"></th>
          <th class="p-3"></th>
          <th class="p-3"></th>
          <th class="p-3"></th>
           
          <th class="p-3">Total Salary</th>
          <th class="p-3"><?php echo $data101['empsal'] ?></th>
          <th class="p-3"></th>
          
         
                  </tr>
                </tfoot>
                
                <tbody>
                	<?php
                  $query5="CALL selemp()";
		      		$run5=mysqli_query($con,$query5);
		      		if(mysqli_num_rows($run5)<1)
		      		{
		      			echo "<tr><td colspan='5'>No Records Found</td></tr>";
		      		}
		      		else
		      		{
		      			while ($data=mysqli_fetch_assoc($run5)) 
		      			{
		      				if($data['status'])
		      				{
		      				?>
		      				<tr>
		      					<form method="post" action="main.php">
		      					<input type="hidden" name="delid" value="<?php echo $data['sid']?>">
		      				    <td class="p-3"><?php echo $data['sid']?></td>
		      					<td class="p-3"><?php echo $data['fname']?></td>
		      					<td class="p-3"><?php echo $data['email']?></td>
		      					<td class="p-3"><?php echo $data['gender']?></td>
		      					<td class="p-3"><?php echo $data['dob']?></td>
		      					<td class="p-3"><?php echo $data['contact']?></td>
		      					<td class="p-3"><?php echo $data['doj']?></td>
		      					<td class="p-3"><?php echo $data['salary']?></td>
		      					<td class="p-3"><button type="submit" name="submit">Delete</button></td>
		      					</form>
		      				</tr>
		      			<?php
		      			}
		      			}
		      		}
		      	?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Past Staff Details</div>
          <div class="card-body">
            <div class="table-responsive">

                </thead>
                <tbody>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<?php
				include '../dbms/dbconnection.php';
				?>
                <thead>
                  <tr>
                  	<th>Staff ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of birth</th>
                    <th>Contact</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    
                  </tr>
                </thead>
                <tbody>
                	<?php
                  $query5="SELECT * FROM staff ORDER BY fname";
		      		$run5=mysqli_query($con,$query5);
		      		if(mysqli_num_rows($run5)<1)
		      		{
		      			echo "<tr><td colspan='5'>No Records Found</td></tr>";
		      		}
		      		else
		      		{
		      			while ($data=mysqli_fetch_assoc($run5)) 
		      			{
		      				if(!($data['status']))
		      				{
		      				?>
		      				<tr>
		      					
		      					
		      				    <td class="p-3"><?php echo $data['sid']?></td>
		      					<td class="p-3"><?php echo $data['fname']?></td>
		      					<td class="p-3"><?php echo $data['email']?></td>
		      					<td class="p-3"><?php echo $data['gender']?></td>
		      					<td class="p-3"><?php echo $data['dob']?></td>
		      					<td class="p-3"><?php echo $data['contact']?></td>
		      					<td class="p-3"><?php echo $data['doj']?></td>
		      					<td class="p-3"><?php echo $data['salary']?></td>
		      					
		      					
		      				</tr>
		      			<?php
		      			}
		      			}
		      		}
		      	?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>

</body>

</html>
<?php
 if(isset($_POST['submit']))
{
            if ($con == false)
            {
            die("ERROR: Could not connect. ".mysqli_connect_error());
            }
           	$delid=$_POST['delid'];
            $sql = "UPDATE staff SET status=0 WHERE sid=$delid";
                if (mysqli_query($con, $sql)) 
              { 
               ?>
               <script>
               	window.alert("Staff deleted Successfully");
               	window.open("main.php","_self");
               </script>
               <?php
              } 
            else
            { 
            	?>
              <script>
               	window.alert("Error!!!!!!!");
               	window.open("main.php","_self");
               </script>
               <?php 
            }
             
            
}

?>