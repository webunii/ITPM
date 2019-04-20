<?php
require 'db.php';
$message = '';
if (isset ($_POST['subject'])  && isset($_POST['messageNote']) ) {
    $subject = $_POST['subject'];
    $messageNote = $_POST['messageNote'];
    $created = @date('Y-m-d H:i:s');
    $sql = 'INSERT INTO notice(subject,messageNote,datet) VALUES(:subject, :messageNote ,:created)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':subject' => $subject, ':messageNote' => $messageNote, ':created' => $created ] )) {
        $message = 'data inserted successfully';
        header("location:index.php");
    }
}