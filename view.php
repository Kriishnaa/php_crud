<?php 
include_once 'db_connection.php';
if(isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['submit'])){
    $emp_name = trim($_POST['empName']);
    $emp_mobile = trim($_POST['empMobile']);
    $emp_mail = trim($_POST['empEmail']);
    if(!empty($emp_name)&&!empty($emp_mobile)){
        $insert_query = "INSERT INTO emp_data (emp_name,emp_mobile,emp_mail) VALUES ('".$emp_name."','".$emp_mobile."','".$emp_mail."')";
        $result = mysqli_query($conn,$insert_query);
        if($result){
            echo "Data has been Inserted !!!";
        }else{
            echo "Data not inserted !!!";
        }
    } else {
        $name_error = "Name Required !!!";
        $mobile_error = "Number Required !!!";
        header('Location:add.php?name_error='.$name_error.'&mobile_error='.$mobile_error);
    }
}
?>
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
 <div class="container" id="EmpData">
    <h2>List of Employee</h2>
    <button><a href="add.php">New</a></button>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th> 
                <th>Mobile</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php $emp_data = "SELECT * FROM emp_data";
          $empAlldata = mysqli_query($conn, $emp_data);
            //echo mysqli_affected_rows($conn);
            while ($rows  = mysqli_fetch_array($empAlldata)){?>
                <tr>
                <td><?php echo $rows['emp_name']; ?></td>
                <td><?php echo $rows['emp_mobile']; ?></td>
                <td><?php echo $rows['emp_mail']; ?></td>
                <td><a href = "edit.php?emp_id=<?php echo $rows['emp_id']; ?>">Edit</a></td>
                <td><a href = "delete.php?emp_id=<?php echo $rows['emp_id']; ?>">Delete</a></td>
                </tr>
                <?php 
            }?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php //mysqli_close($conn); ?>
