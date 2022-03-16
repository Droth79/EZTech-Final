<?php
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "web499";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

$sql = "CREATE TABLE IF NOT EXISTS 'employee' (
	'id' int(11) NOT NULL,
	'full name' varchar(25) DEFAULT NULL,
	'phone' varchar(10) DEFAULT NULL,
	'email' varchar(35) DEFAULT NULL,
	'ssn' varchar(10) DEFAULT NULL,
	'dob' varchar(10) DEFAULT NULL,
	'salary' varchar(8,0) DEFAULT NULL,
	'address' varchar(45) DEFAULT NULL,
	'password' varchar(8) DEFAULT NULL,
	PRIMARY KEY ('id')
	)"ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	
$sql = "CREATE TABLE IF NOT EXISTS 'Admin' (
	'id' int(11) NOT NULL,
	'phone' varchar(10) DEFAULT NULL,
	'email' varchar(35) DEFAULT NULL,
	'ssn' varchar(10) DEFAULT NULL,
	'dob' varchar(10) DEFAULT NULL,
	'salary' varchar(8,0) DEFAULT NULL,
	'address' varchar(45) DEFAULT NULL,
	'password' varchar(8) DEFAULT NULL,
	'employee_id' int(11) NOT NULL,
	PRIMARY KEY ('id')
	UNIQUE KEY ('employee_id')
	)"ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	
INSERT INTO 'employee' ('id', 'full name', 'phone', 'email', 'ssn', 'dob', 'salary', 'address', 'password') VALUES
(1, 'manish kane', '9009998888', 'manishk@gmail.com', '1234567890', '30000', '123 Fake Street', 2343qwer'),
(2, 'akol loki', '8008887777', 'akoll@yahoo.com', '2345678900', '35000', 234 Goaway Drive', '2123asdf'),
(3, 'kamal harrison', 7007776666', 'kamalh@comcast.net', 5678901234', '38000', '456 None Place', '4565zxcv');
    
if (mysqli_query($conn, $sql)) {
	echo "Table employee created successfully";
	} else {
	echo "Error creating table: " . mysqli_error($conn);
	}
	
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="card text-center" style="padding:20px;">
  <h3>Admin Login</h3>
</div><br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">      
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form action="" method="POST">
          <div class="form-group">
            <label for="full name">Employee Name:</label>
            <input type="text" class="form-control" name="full name" placeholder="Enter Name" required="">
          </div>
          <div class="form-group">  
            <label for="phone">Employees Phone Number:</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter Phone#" required="">
          </div>
          <div class="form-group">
          	<label for="email">Employees Email Address:</label>
          	<input type="text" class="form-control" email="email" placeholder="Enter Email Address" required="">
          <div class="form-group">
          	<label for="ssn">Employees Social Security:</label>
          	<input type="text" class="form-control" ssn="ssn" placeholder="Enter SSN#" required="">
          <div class="form-group">
          	<label for="dob">Employees Date of Birth:</label>
          	<input type="text" class="form-control" dob="dob" placeholder="Enter DoB" required="">
          <div class="form-group">
          	<label for="salary">Employees Salary:</label>
          	<input type="text" class="form-control" salary="salary" placeholder="Enter Salary Info" required="">
          <div class="form-group">
          	<label for="address">Employees Address:</label>
          	<input type="text" class="form-control" address="address" placeholder="Enter Address" required="">
          <div class="form-group">  
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
          </div>
          <div class="form-group">
            <p>Already have account?<a href="login.php"> Login</a></p>
            <input type="submit" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="card text-center" style="padding:20px;">
  <h3>Admin Login</h3>
</div><br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form action="" method="POST">
          <div class="form-group">  
            <label for="username">Username:</label> 
            <input type="text" class="form-control" name="username" placeholder="Enter Username" >
          </div>
          <div class="form-group">  
            <label for="password">Password:</label> 
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <p>Not registered yet ?<a href="index.php"> Register here</a></p>
            <input type="submit" name="submit" class="btn btn-success" value="Login"> 
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>

<?php
session_start();
include_once('config.php');
if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}
?>
<style type="text/css">
    .nav-link{
   color: #f9f6f6;
   font-size: 14px;
    }   
</style>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
       <body>
       <nav class="navbar navbar-info sticky-top bg-info flex-md-nowrap p-10">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="" style="color: #5b5757;"><b>Administrators Only</b></a>
               <ul class="navbar-nav px-3">
         <li class="nav-item text-nowrap">
                 <a class="nav-link" href="logout.php">Welcome, <?php echo ucwords($_SESSION['NAME']); ?> Log out</a>
         </li>
          </ul>
      </nav>      
      <div class="container-fluid">
          <div class="row">
         <nav class="col-md-2 d-none d-md-block bg-info sidebar" style="height: 569px">
                 <div class="sidebar-sticky">
                 <ul class="nav flex-column" style="color: #5b5757;">
                <li class="nav-item">
               <a class="nav-link active" href="">
               <span data-feather="home"></span>
                        Dashboard <span class="sr-only">(current)</span>
               </a>
                </li>
            <?php if($_SESSION['Admin'] == 'Admin'){ ?>
            <h6>Add Employees</h6>   
                <li class="nav-item">
               <a class="nav-link" href="">
                       <span data-feather="fullname"></span>
                   Delete Employee
               </a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link" href="">
                   <span data-feather="fullname"></span>
                   Edit Employees Information
               </a>
                </li>
                <li class="nav-item">
               <a class="nav-link" href="">
                       <span data-feather="fullname"></span>
               </a>
                </li>
            <?php } ?>
            <?php if ($_SESSION['Admin'] == 'Admin' || $_SESSION['employee'] == 'employee') { ?>
            <h6>List of Employees</h6>      
                <li class="nav-item">
               <a class="nav-link" href="">
                   <span data-feather="employee_id"></span>
                   Add Employees
               </a>
                </li>
                <li class="nav-item">
               <a class="nav-link" href="">
                       <span data-feather="employee_id"></span>
                   Delete Employees
               </a>
                </li>   
                <h6>Edit Employee Information</h6>
               <li class="nav-item">
                       <a class="nav-link" href="">
                       <span data-feather="employee_id"></span>
                  Employees
                   </a>
               </li>
               
            <?php } ?>                  
             </ul>
         </div>
          </nav>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
          <h1 class="h2">Dashboard</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
             <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Social Security</th>
            <th>Date of Birth</th>
            <th>Salary</th>
            <th>Address</th>
            <th>Password</th>
            <th>Employee Id</th>
         </tr>
          </thead>
          <tbody>
         <?php
                 if ($_SESSION['employee'] == "employee") {
            $sql = "SELECT * FROM employee";
             }else{
            $fullname = $_SESSION['fullname'];
            $sql = "SELECT * FROM employee WHERE fullname = '$fullname'";
             }
        
         ?>      
             <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['fullname']?></td>
            <td><?php echo $row['phone']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['ssn']?></td>
            <td><?php echo $row['dob']?></td>
            <td><?php echo $row['salary']?></td>
            <td><?php echo $row['address']?></td>
            <td><?php echo $row['password']?></td>
            <td><?php echo $row['employee_id']?></td>
                 
             </tr>
         
         </tbody>
         	</table>
        </div>
          </main>
      </div>
    	</div>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    feather.replace();
</script>         
</body>
</html>
    	
         <?php if (authorize($_SESSION["access"]["INVT"]["employee_id"]["create"])) { ?>
         <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus"></i> ADD
         Employee</button>
         <?php }?>  
         
         <?php if (authorize($_SESSION["access"]["INVT"]["employee_id"]["edit"])) { ?>
         <button class="btn btn-sm btn-info" type="button"><i class="fa fa-edit"></i>
         EDIT Employee</button>
         <?php } ?>
         
         <?php if (authorize($_SESSION["access"]["INVT"]["employee_id"]["view"])) { ?>
         <button class="btn btn-sm btn-warning" type="button"><i class="fa fa-search-plus"></i>
         VIEW Employees</button>
         <?php } ?>
         
         <?php if (authorize($_SESSION["access"]["INVT"]["employee_id"]["delete"])) { ?>
         <button class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash-o"></i>
         DELETE Employees</button>
         <?php } ?> 
         
         <?php
         $status = FALSE;
         if (authorize($_SESSION["access"]["INVT"]["employee_id"]["create"]) ||
         authorize($_SESSION["access"]["INVT"]["employee_id"]["edit"]) ||
         authorize($_SESSION["access"]["INVT"]["employee_id"]["view"]) ||
         authorize($_SESSION["access"]["INVT"]["employee_id"]["delete"])) {
         $status = TRUE;
         }
         
         if ($status === FALSE) {
         die("You dont have the permission to access this page");
         }  
          
         ?>                   

<?php
   session_start();
   session_destroy();
   session_unset($_SESSION['fullname']);
   session_unset($_SESSION['phone']);
   session_unset($_SESSION['id']);
   header("Location:login.php");
   die();
?>