<?php
// create 
if (isset($_POST['add'])) {
    $item = $_POST['item'];
    if (!empty($item)) {
        $query1 = "INSERT INTO todo (Name) VALUES ('$item')";

        if (mysqli_query($conn, $query1)) {
            echo '
                <center>
                <div class="alert alert-success">Item Added Successfully!</div>
                </center>
                ';
        } else {
            echo mysqli_error($conn);
        }
    }
}

//    update  OR delete
if (isset($_GET['action'])) {
    $itemId = $_GET['item'];
    if ($_GET['action'] == 'done') {
        $query1 = "UPDATE todo SET status = 1 WHERE id = '$itemId'";

        if (mysqli_query($conn, $query1)) {
            echo '
                <center>
                 <div class="alert alert-info">Item Marked As Done!</div>
                </center>
                ';
        } else {
            echo mysqli_error($conn);
        }
    } else if ($_GET['action'] == 'delete') {
        $query = "DELETE FROM todo WHERE id = '$itemId' ";
        if (mysqli_query($conn, $query)) {
            echo '
                <center>
                  <div class="alert alert-danger">Item Deleted Successfully!</div>
                </center>
                ';
        } else {
            echo mysqli_error($conn);
        }

    }
}


?>