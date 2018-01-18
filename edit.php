<?php 
$id = $_GET['id'];
$con = new PDO('mysql:dbname=thu;host=localhost', 'root', '');
$statement = $con->prepare('select * from teachers where id=:id');
$statement->execute([
  ':id' => $id
]);
$teacher = $statement->fetch(PDO::FETCH_OBJ);
if ( isset ($_POST['name']) && isset($_POST['email'])) {
  echo 'hello world';
  $statement = $con->prepare('update teachers set name=:name, email=:email where id=:id');
  $statement->execute([
    ':name' => $_POST['name'],
    ':email' => $_POST['email'],
    ':id' => $id
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
        <h2>update teacher</h2>
      </div>
      <div class="card-body">
       <form action="" method="post">
         <div class="form-group">
          <label for="name">name</label>
          <input value="<?= $teacher->name ?>" type="text" name="name" id="name" class="form-control">
         </div>
         <div class="form-group">
           <label for="email">email</label>
           <input value="<?= $teacher->email ?>" type="text" name="email" id="email" class="form-control">
         </div>
         <div class="form-group">
           <button type="submit" class="btn btn-outline-info">update teacher</button>
         </div>
       </form> 
      </div>
    </div>
  </div>
  
</body>
</html>