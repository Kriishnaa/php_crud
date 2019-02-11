<?php include_once 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD DEMO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
if(isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['emp_id'])){
    $update_query = "UPDATE emp_data SET emp_name='".trim($_POST['empName'])."',emp_mobile='".trim($_POST['empMobile'])."',emp_mail='".trim($_POST['empEmail'])."' WHERE emp_id='".$_POST['emp_id']."'";
    $final_query = mysqli_query($conn,$update_query);
    if($final_query){
        echo "Data has been updated !!!";
        header('Location:view.php');
    }else{
        echo "Data has not been updated , Something went wrong !!!";
    }
}
if(isset($_SERVER['REQUEST_METHOD']) == "GET" && $_GET['emp_id'] != ""){
    $emp_id = trim($_GET['emp_id']);
    $get_empdata = "SELECT * FROM emp_data WHERE emp_id = ".$emp_id;
    $edit_query = mysqli_query($conn, $get_empdata);
    while($row = mysqli_fetch_array($edit_query)){
        $empname = $row['emp_name'];
        $empmobile = $row['emp_mobile'];
        $empmail = $row['emp_mail'];
    }
}else{
    header('Location:view.php');
} ?>    
<div class="container" id="EmpForm">
    <h2>Edit of the Employee Data</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       <div class="form-group">
         <label for="email">Name:</label>
         <input type="text" class="form-control" id="empName" placeholder="Enter Name" name="empName" value="<?php echo $empname; ?>">
       </div>
       <div class="form-group">
         <label for="email">Mobile:</label>
         <input type="text" class="form-control" id="empMobile" placeholder="Enter Mobile" name="empMobile" value="<?php echo $empmobile; ?>">
       </div>
       <div class="form-group">
         <label for="email">Email:</label>
         <input type="email" class="form-control" id="empEmail" placeholder="Enter Email" name="empEmail" value="<?php echo $empmail; ?>">
       </div>
        <input type='hidden' name="emp_id" value="<?php echo $emp_id; ?>">
        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <button><a href="view.php">All DATA</a></button>
   </form>
</div>
</body>
</html>
<?php mysqli_close($conn); ?>