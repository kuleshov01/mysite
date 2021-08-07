<?php
session_start();
$file = '../config/dbconnection.php';
if (file_exists($file)) {
    require '../config/dbconnection.php';
    require 'Autoload.php';
    $login = new UserClass();
    $check = new CheckValidUser();
} else {
    header('Location: install.php');
}
if ($login->isLoggedIn() === true) {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        include '../elements/header.php';
        ?>
        </head>
        <body>
            <!-- start menu -->                     
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="menu-logo">
                        <div class="navbar-brand">
                            <a class="navbar-logo" href="<?php echo $base; ?>">
                                <?php echo SITE_NAME; ?> 
                            </a>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> 
                    </button>
                    <div id="navbarNavDropdown" class="navbar-collapse collapse
                         justify-content-end">
                        <ul class="navbar-nav nav-pills nav-fill">
                            <li class="nav-item">
                                <a class="btn btn-success" href="list.php"><i class="fa fa-list" aria-hidden="true"></i> View Page List</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary" href="add.php"><i class="fa fa-file-o" aria-hidden="true"></i> Add New Page</a>
                            </li> 
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="settings.php"><i class="fa fa-gear" aria-hidden="true"></i> Edit Settings</a> 
                            </li>
                        </ul>    
                    </div>
                </div>
            </nav>
            <!<!-- end menu -->
            <div class="container">
                <div class="row">

                    <div class="col-md-12 py-3">
                        <?php
// Edit page properties
                        if (isset($_POST['submit']) && !empty($_FILES['image'])) {

                            //
                            $errors = array();
                            $file_name = $_FILES['image']['name'];
                            $file_size = $_FILES['image']['size'];
                            $file_tmp = $_FILES['image']['tmp_name'];
                            $file_type = $_FILES['image']['type'];
                            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                            // $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

                            $extensions = array(
                                "jpeg",
                                "jpg",
                                "png"
                            );

                            if (in_array($file_ext, $extensions) === false) {
                                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                            }

                            if ($file_size > 2097152) {
                                $errors[] = 'File size must be excately 2 MB';
                            }

                            if (empty($errors) == true) {
                                move_uploaded_file($file_tmp, "uploads/" . $file_name);
                                echo '<div class="alert alert-success" role="alert">';
                                echo "Success";
                                echo '</div>';
                            } else {
                                print_r($errors);
                            }

                            $title = $_POST['title'];
                            $link = strtolower(str_replace(" ", "-", $_POST['link']));
                            $keyword = $_POST['keyword'];
                            $classification = $_POST['classification'];
                            $description = $_POST['description'];
                            $parent = $_POST['parent'];
                            $active = $_POST['active'];

                            if (empty($_POST['image'])) {
                                $image = $_POST['imagen'];
                            } else {
                                $image = $file_name;
                            }

                            $sql = "UPDATE page SET title ='" . protect($title) . "', link ='" . protect($link) . "', keyword ='" . protect($keyword) . "', classification = '" . protect($classification) . "', description='" . protect($description) . "', image ='" . protect($file_name) . "', parent = '" . protect($parent) . "', active = '" . protect($active) . "' WHERE id='$id'";
                            if ($conn->query($sql) === TRUE) {

                                $sqlm = "UPDATE menu SET title_page = '" . protect($title) . "', link_page = '" . protect($link) . "', parent_id = '" . protect($parent) . "' WHERE page_id='$id'";
                                if ($conn->query($sqlm) === TRUE) {

                                    echo '<div class="alert alert-success" role="alert">';
                                    echo "Page " . $title . " : Created ";
                                    echo '</div>';
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo "Failed: The page was not added to the menu";
                                    echo '</div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo "Failed: The page has not been created";
                                echo '</div>';
                            }
                            echo '<meta http-equiv="refresh" content="3; url=builder.php?id=' . $id . '" />';
                        }
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $row = $conn->query("SELECT * FROM page WHERE id='$id'")->fetch_assoc();
                            $title = $row['title'];
                            $link = $row['link'];
                            $keyword = $row['keyword'];
                            $classification = $row['classification'];
                            $description = $row['description'];
                            $image = $row['image'];
                        }
                        echo '<h3>Edit page: ' . $title . '</h3>' . "\n";
                        echo '<form method="post" enctype="multipart/form-data">' . "\n";
                        echo '<div class="row"><div class="col-md-6">' . "\n";
                        echo '<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="' . $title . '">
  </div>' . "\n";
                        echo '</div><div class="col-md-6">' . "\n";
                        echo '<div class="form-group">
    <label for="link">Link</label>
    <input type="text" class="form-control" id="link" name="link" value="' . $link . '">
  </div>' . "\n";
                        echo '</div></div><div class="form-group">
    <label for="keyword">Keyword</label>
    <input type="text" class="form-control" id="keyword" name="keyword" value="' . $keyword . '">
  </div>' . "\n";
                        echo '<div class="form-group">
    <label for="classification">Classification</label>
    <input type="text" class="form-control" id="classification" name="classification" value="' . $classification . '">
  </div>' . "\n";
                        echo '<div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="' . $description . '">
  </div>' . "\n";
                        echo '<div class="form-group">
    <label for="image">Image:</label>
    <input type="file" class="form-control" id="image" name="image">
        <input type="text" class="form-control" id="imagen" name="imagen" value="' . $image . '" readonly="readonly">
  </div>' . "\n";
                        echo '<div class="form-group">
    <label for="parent">Parent</label>' . "\n";
                        pparent($row['parent']);
                        echo '</div>' . "\n";

                        echo '<div class="form-group">
    <label for="active">Active</label>
    <select class="form-control" id="active" name="active">';
                        action($row['active']);
                        echo '</select>
  </div>' . "\n";
                        echo '<input type="submit" name="submit" class="btn btn-primary" value="Save">' . "\n";
                        echo '</form>' . "\n";
                        ?>
                    </div>
                </div>
            </div>
            <?php
            include '../elements/header.php';
            ?>
            <script>
                $(function () {
                    $("#title").keyup(function () {

                        var value = $(this).val();
                        value = value.toLowerCase();

                        value = value.replace(/ /g, "-");
                        $("#link").val(value);
                    }).keyup();
                });
            </script>
        </body>
        </html>
        <?php
    } else {
        header('Location: list.php');
    }
} else {
    header('Location: ../index.php');
}
?>