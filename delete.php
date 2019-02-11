<?php 
include_once("db_connection.php"); 
if(isset($_SERVER['REQUEST_METHOD']) == "GET" && $_GET['emp_id'] !=""){
    $delete_before = "DELETE FROM emp_data WHERE emp_id='".$_GET['emp_id']."'";
    $delete_query = mysqli_query($conn,$delete_before);
    if($delete_query){
        echo "Data has been deleted !!!";
    }else{
        echo "Data has not been deleted ,something went wrong !!!";
    }
    header('Location:view.php');
}else{
    header('Location:view.php');
}
mysqli_close($conn); 
?>