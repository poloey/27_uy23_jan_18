<?php 
if ( isset ($_POST['name']) && isset($_POST['email'])) {
  $con = new PDO('mysql:dbname=thu;host=localhost', 'root', '');
  $statement = $con->prepare('insert into teachers(name, email) values(:name, :email)');
  $statement->execute([
    ':name' => $_POST['name'],
    ':email' => $_POST['email']
  ]);
  header("Location: /");

}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All teachers</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
  <?php require 'nav.php'; ?>
  <div class="container">
    <div class="card mt-5">
      <div class="card-header">
        <h2>add a teacher</h2>
      </div>
      <div class="card-body">
       <form action="" method="post">
         <div class="form-group">
          <label for="name">name</label>
          <input type="text" name="name" id="name" class="form-control">
         </div>
         <div class="form-group">
           <label for="email">email</label>
           <input type="text" name="email" id="email" class="form-control">
         </div>
         <div class="form-group">
           <button type="submit" class="btn btn-outline-info">Add teacher</button>
         </div>
       </form> 
      </div>
    </div>
  </div>
  
</body>
</html>