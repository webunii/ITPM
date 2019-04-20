<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM notice WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("location:index.php");
}
