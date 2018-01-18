<?php 
$con = new PDO('mysql:dbname=thu;host=localhost', 'root', '');
$statement = $con->prepare('select * from teachers order by id desc');
$statement->execute();
$teachers = $statement->fetchAll(PDO::FETCH_OBJ);

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
        <h2>All teachers</h2>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>action</th>
          </tr>
          <?php foreach($teachers as $teacher): ?>
            <tr>
              <td><?= $teacher->id ?></td>
              <td><?= $teacher->name ?></td>
              <td><?= $teacher->email ?></td>
              <td>
                <a class="btn btn-info" href="edit.php?id=<?= $teacher->id ?>">Edit</a>
                <a class="btn btn-warning" href="delete.php?id=<?= $teacher->id ?>">Delete</a>
              </td>

            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
  
</body>
</html>