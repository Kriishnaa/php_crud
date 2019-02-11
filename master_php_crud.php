<?php 
//database connection
$connection = mysqli_connect("localhost","root","","krishna");
if(!$connection){
    die("Somethnig went wrong".mysqli_error());
}
//table name : information : two field names are 1) info_id(primary key) and 2) info_name
//data insert
if(isset($_POST['submit']) && !empty(trim($_POST['info_name']))){
    $insert_data = "INSERT INTO information (info_name) VALUES ('".$_POST['info_name']."')";
    $insert_query = mysqli_query($connection,$insert_data);
    if($insert_query){
        echo "<h5 align='center'>Data has been saved !</h5>";
    }else{
        echo "<h5 align='center'>Failed to save!</h5>";
    }
}
//edit id data fetch
if(isset($_GET['edit_id'])){
    //$edit_data = "UPDATE SET info_name = '".$_POST['info_name']."' WHERE info_id = '".$_GET['info_id']."'";
    $edit_data = "SELECT * FROM information WHERE info_id = '".$_GET['edit_id']."'";
    $edit_query = mysqli_query($connection,$edit_data);
    while($row_data = mysqli_fetch_array($edit_query)){
        $info_name = $row_data['info_name'];
    }
    
}
//edit data save
if(isset($_POST['info_id']) && isset($_POST['info_name']) && isset($_POST['update'])){
    $edit_master_data = "UPDATE information SET info_name = '".$_POST['info_name']."' WHERE info_id = '".$_POST['info_id']."'";
    $edit_master_query = mysqli_query($connection,$edit_master_data);
    if($edit_master_query){
        echo "<h5 align='center'>Data has been updated !</h5>";
    }else{
        echo "<h5 align='center'>Failed to update !</h5>";
    }
}
//data delete
if(isset($_GET['delete_id'])){
    $delete_data = "DELETE FROM information WHERE info_id = '".$_GET['delete_id']."'";
    $delete_query = mysqli_query($connection,$delete_data);
    if($delete_query){
        echo "<h5 align='center'>Data has been deleted !</h5>";
    }else{
        echo "<h5 align='center'>Failed to delete !</h5>";
    }
}
?>
<!-- begin insert and update form -->
<div align = "center">
<form action="master_php_crud.php" method="post">
    <input type="text" name="info_name" value="<?php echo isset($info_name) ? $info_name : "" ; ?>">
    <input type="hidden" readonly="readonly" name="info_id" value="<?php echo isset($_GET['edit_id']) ? $_GET['edit_id'] : ""?>">
    <input type="submit" name="<?php echo isset($_GET['edit_id']) ? 'update' : 'submit' ?>">
</form>
</div>
<!-- end insert and update form -->
<!-- begin fetch all data -->
<table align = "center">
    <tr><th>Information</th><th>Edit</th><th>Delete</th></tr>
    <?php 
    $fetch_data = "SELECT * FROM information ORDER BY info_name";
    $fetch_query = mysqli_query($connection,$fetch_data);
    $finalarray = array(); 
    while($rdata = mysqli_fetch_array($fetch_query)){
        $data['name'] = $rdata['info_name'];
    ?>
    <tr>
        <td><?php echo $rdata['info_name']; ?></td>
        <td><a href="master_php_crud.php?edit_id=<?php echo $rdata['info_id']; ?>">Edit</a></td>
        <td><a href="master_php_crud.php?delete_id=<?php echo $rdata['info_id']; ?>">Delete</a></td></tr>
    <?php 
    $master_array[] = $data;
    }
    $finalarray['aa'] = $master_array;
    ?>
</table>
<?php //echo json_encode($finalarray); ?>
<!-- end fetch all data -->