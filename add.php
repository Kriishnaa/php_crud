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
<div class="container" id="EmpForm">
    <h2>Employee Registration</h2>
    <button><a href="view.php">All DATA</a></button>
    <form action="view.php" method="post">
       <div class="form-group">
         <label for="email">Name:</label>
         <input type="text" class="form-control" id="empName" placeholder="Enter Name" name="empName">
         <span><?php echo isset($_GET['name_error'])!=""?$_GET['name_error']:""; ?></span>
       </div>
       <div class="form-group">
         <label for="email">Mobile:</label>
         <input type="text" class="form-control" id="empMobile" placeholder="Enter Mobile" name="empMobile">
         <span><?php echo isset($_GET['mobile_error'])!=""?$_GET['mobile_error']:""; ?></span>
       </div>
       <div class="form-group">
         <label for="email">Email:</label>
         <input type="email" class="form-control" id="empEmail" placeholder="Enter Email" name="empEmail">
       </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
   </form>
</div>
</body>
</html>