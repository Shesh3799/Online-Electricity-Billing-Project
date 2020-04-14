<?php
session_start();
  if(!(isset($_SESSION["staffname"])))
  {
    ?>
    <script>
        window.open("../public/login.php","_self");
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

  <title>Coonection Details</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Welcome <?php echo $_SESSION["staffname"];?></a>

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
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="cdetails.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Connection Details</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="register.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Add Connection</span></a>
      </li>
         <li class="nav-item active">
        <a class="nav-link" href="registered.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Registered Connection</span></a>
        </li>
      <li class="nav-item active">
        <a class="nav-link" href="add.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Add Bill</span>
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
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Customer ID</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Transaction Date</th>
                    <th>Amount</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                     <th class="p-3"></th>

                    <th class="p-3"></th>
         
          
          <?php
          include '../dbms/dbconnection.php';
          $sqll="select sum(amount) as pending from bills where status=1";
          $runn=mysqli_query($con,$sqll);
          $dataa=mysqli_fetch_assoc($runn);
          ?>  
           <th class="p-3"></th>
          <th class="p-3">Total Bill to be collected</th>
          <th class="p-3"><?php echo $dataa['pending'] ?></th>
         
          
         
                  </tr>
                </tfoot>
             
                
                <tbody>
                  <?php
                  include '../dbms/dbconnection.php';
                  $query6="SELECT * FROM bills";
              $run6=mysqli_query($con,$query6);
              if(mysqli_num_rows($run6)<1)
              {
                echo "<tr><td colspan='5'>No Records Found</td></tr>";
              }
              else
              {
                while ($data2=mysqli_fetch_assoc($run6)) 
                {
                  if($data2['status'])
                  {
                  ?>
                  <tr>
                    
                     <td class="p-3"><?php echo $data2['cid']?></td>
                     <td class="p-3"><?php echo $data2['month']?></td>
                    <td class="p-3"><?php echo $data2['year']?></td>
                      <td class="p-3"><?php echo $data2['tdate']?></td>
                    <td class="p-3"><?php echo $data2['amount']?></td>
                   
                    
                    
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
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
