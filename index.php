  <?php
   require("server.php");
   require("crud.php");
?>

<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <title>To Do List Application</title>
    <style>
        .done {
            text-decoration: line-through;
        }

        body {
            background-color: #FFFDF6;
        }
    </style>
</head>

<body>
    <main>
        <div class="container pt-5">
            <div class="row">
                <div class="col-sm-12 col-md-3"></div>
                <div class="col-sm-12 col-md-6">
                    <div class="card">

                        <div class="card-header">
                            <center>
                                <h3>ToDo List</h3>
                            </center>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                                <div class="mb-4">
                                    <input type="text" class="form-control" name="item" placeholder="Add a New Task">
                                </div>
                                <input type="submit" class="btn btn-dark" name="add" value="+ Add">
                            </form>

                            <div class="mt-5 mb-4"></div>

                            <?php
                            $query = "Select * from todo";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                $i = 1;
                                while ($row = $result->fetch_assoc()) {
                                    $done = $row['status'] == 1 ? "done" : "";
                                    echo '<div class="row mt-3">
                                            <div class="col-sm-12 col-md-1"><h5>' . $i . '</h5></div>
                                            <div class="col-sm-12 col-md-6"><h5 class = "' . $done . '">' . $row['Name'] . '</h5></div>
                                            <div class="col-sm-12 col-md-5">
                                                <a href="? action=done&item=' . $row['id'] . '" class="btn btn-outline-primary">Mark as Done</a>
                                                <a href="? action=delete&item=' . $row['id'] . '" class="btn btn-outline-danger">Delete</a>
                                            </div>
                                        </div>';
                                    $i++;
                                }
                            } else {
                                echo '
                                    <center>
                                        <img src="folder.png" alt="No List Added"><br>
                                        <span>Your List is Empty</span>
                                    </center>';
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
        </script>
    <script>
        $(document).ready(function () {
            $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                $('.alert').slideUp(500);
            })
        })
    </script>

</body>

</html>