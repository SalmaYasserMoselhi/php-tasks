<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_line'])) {
    $line_to_delete = $_POST['delete_line'];
    $lines = file("clients.txt");
    $file = fopen("clients.txt", "w");
    for ($i = 0; $i < count($lines); $i++) {
        if ($i != $line_to_delete) {
            fwrite($file, $lines[$i]);
        }
    }
    fclose($file);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white text-center py-3">
                        <h4 class="mb-0 text-primary">All Customers</h4>
                    </div>
                    <div class="card-body px-4 py-4">

                        <?php
                        if (file_exists("clients.txt") && filesize("clients.txt") > 0) {
                            $lines = file("clients.txt");
                        ?>

                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Gender</th>
                                    <th>Skills</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($lines); $i++) {
                                    $line = trim($lines[$i]);
                                    if (empty($line)) {
                                        continue;
                                    }

                                    $data = explode("|", $line);

                                    echo "<tr>";
                                    echo "<td>" . ($i + 1) . "</td>";
                                    echo "<td>{$data[0]}</td>";
                                    echo "<td>{$data[1]}</td>";
                                    echo "<td>{$data[2]}</td>";
                                    echo "<td>{$data[3]}</td>";
                                    echo "<td>{$data[4]}</td>";
                                    echo "<td>{$data[5]}</td>";
                                    echo "<td>{$data[6]}</td>";
                                    echo "<td>{$data[7]}</td>";
                                    echo "<td>";
                                    echo "<form method='post' action='view_clients.php'>";
                                    echo "<input type='hidden' name='delete_line' value='$i'>";
                                    echo "<button type='submit' class='btn btn-danger btn-sm'>Delete</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        } else {
                            echo "<div class='alert alert-info text-center'>No clients found. <a href='registration.php'>Add a client</a></div>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
