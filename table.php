
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Welcome
          <span class="text-danger" id = "name"></span>
        </div>
      </a>
      <?php
        session_start();
        $db = mysqli_connect("localhost", "root", "","instajob");
        $userprofile = $_SESSION['email'];
        $query = "SELECT * FROM users WHERE Email = '$userprofile'";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
        $fName;
        $lName;
        if ($count == 1) {
          while($row = mysqli_fetch_assoc($result)) {
               if ($row['Email'] == $userprofile) {
                 $fName = $row['FName'];
                 $lName = $row['LName'];
                 $id = $row['Id'];
                 $_SESSION['Id'] = $id;
                 echo "<script type = 'text/javascript'>
                 document.getElementById('name').innerHTML=' $fName $lName';
                 </script>";
                 break;
               }
            }
        }
        mysqli_close($db);
      ?>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fas fa-home"></i>
                <span>Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">
                  <i class="fas fa-code"></i>
                  <span>About Us</span></a>
            </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id = "welcome"></span>
                <img class="img-profile rounded-circle" src="img/user.png">
              </a>
              <!-- Dropdown - User Information -->

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">Below is the table that display all the info about the job that recruiter has added. Recruiter can also modify the information if they are from the same company  .</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Table for all the job that you have added. Click edit to modify the job info</h6>
                      </div>
                      <div class="card-body" style = "padding:0">
                        <div class="table-responsive">
                          <table id='editable_table' class='table table-bordered table-striped' id='dataTable' width='100%' cellspacing='0'>
                            <thead>
                              <tr>
                              <th>Job_ID</th>
                                <th>Company Name</th>
                                <th>Location</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Salary</th>
                              </tr>
                            </thead>
                          <?php
                              $db = mysqli_connect("localhost", "root", "","instajob");
                              $sql = "SELECT * FROM Job";
                              $id_array = array();
                              if ($result=mysqli_query($db,$sql)) {
                                // Return the number of rows in result set
                                  while($row = mysqli_fetch_assoc($result)) {
                                    $count = 0;
                                    $id = $row['Job_ID'];
                                    $_SESSION['Job_ID'] = $id;
                                    $title = $row['Title'];
                                    $description = $row['Description'];
                                    $salary = $row['Salary'];
                                    $sql1 = "SELECT * FROM Company";
                                    $name;
                                    $location;
                                    if ($result1=mysqli_query($db,$sql1)) {
                                      while($row1 = mysqli_fetch_assoc($result1)) {
                                        if ($row['Job_ID'] == $row1['Job_ID']) {
                                            $name = $row1['CName'];
                                            $location = $row1['Location'];
                                            $_SESSION['name'] = $name;
                                            $_SESSION['location'] = $location;
                                        }
                                      }
                                    }
                                    $name = $_SESSION['name'];
                                    $location = $_SESSION['location'];
                                    echo"
                                    <tbody>
                                    <tr>
                                      <td>$id</td>
                                      <td>$name</td>
                                      <td>$location</td>
                                      <td>$title</td>
                                      <td>$description</td>
                                      <td>$salary</td>
                                    </tr>
                                    </tbody>";
                                  }

                              }
                           ?>
                           <tfoot>
                                      <tr>
                                        <td>Job_ID</td>
                                        <td>Company Name</td>
                                        <td>Location</td>
                                        <td>Title</td>
                                        <td>Description</td>
                                        <td>Salary</td>
                                        </tr>
                                        </tfoot>
                         </table>
                       </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="js/welcome.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="jquery-tabledit-1.2.3/jquery.tabledit.js"></script>
  <script>
  $(document).ready(function(){
       $('#editable_table').Tabledit({
        url:'action.php',
        columns:{
          identifier:[0, 'Job_ID'],
          editable:[[1, 'CName'], [2, 'Location'], [3, 'Title'], [4, 'Description'], [5, 'Salary']]
          },
            restoreButton:false,
           onSuccess:function(data, textStatus, jqXHR)
            {
             if(data.action == 'delete')
             {
              $('#'+data.id).remove();
             }
            }
           });

      });
 </script>


</body>

</html>
