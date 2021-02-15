<?php
    session_start();

    include("../includes/db_connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../bs4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../vendors/chartist/chartist.min.css">
</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <table class="table table-hover table-borderless table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Question</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                    $query = "SELECT * FROM posts";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) == 0){
                        echo "no result in database";
                    }else {
                        $sn = 1;

                        while ($row = mysqli_fetch_assoc($result)){
                        $body = $row['body'];
                        $id = $row['id'];

echo "                <tr>
                        <td>$sn</td>
                        <td>$body</td>
                        <td>
                            <a type='button' href='index.php?action='.$id.'' class='btn-danger btn-sm' data-toggle='modal' data-target='#modelId'> <i class='fa fa-trash-o'></i> Delete</a>
                        </td>
                    </tr>
                        ";
                
                            $sn++;
                        }
        
                    }
                ?>

                
            </tbody>
        </table>
        
    </div>

    <script src="../bs4/J_query/jquery-3.5.1.js"></script>
    <script src="../bs4/js/bootstrap.min.js"></script>

</body>
</html>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <?php
                            
                            $query = "SELECT * FROM posts";
                            $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)){
                                $body = $row['body'];
                                $id = $row['id'];


                                }                                        

                        ?>
                        <p>Are you sure you want to delete?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a class="btn btn-danger" href="delete.php?action=<?=$id ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>