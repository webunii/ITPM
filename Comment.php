
<?php
include_once('db/dbcon.php');
if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //have we expired?
    //redirect to logout.php
    header('Location: logout2.php'); //change yoursite.com to the name of you site!!
} else{ //if we haven't expired:
    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}


if(isset($_POST['add_comment'])){
    $uname = $_POST['uname'];
    $cour_name = $_POST['cour_name'];
    $comment = $_POST['comment'];
    $pageId = $_POST['pageid'];

    if ($comment != null) {
        $comsql = "INSERT INTO feedback (comment,name,course) VALUES ('$comment','$uname','$cour_name')";
        $result = $db->query($comsql);

        if($result > 0) {

            $_SESSION['username'] = $_POST['uname'];
            $_POST['success'] = "Comment Posted";
            header("location:materials.php?id=$pageId");

        }
    }
}

if(isset($_POST['del_com'])){
    // sql to delete a record
    $id = $_GET['id'];
    $pageId = $_POST['pageid'];

    $delete_id = $_POST['delete_id'];
    $sqldel = "DELETE FROM feedback WHERE id='$delete_id'";
    $result=$db->query($sqldel);
    if($result > 0) {

        $_SESSION['username'] = $_POST['uname'];
        $_POST['success'] = "Comment Deleted";

        header("location:materials.php?id=$pageId");
    }
}
?>
