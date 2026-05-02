<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-5">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $first_name = $_POST['first_name'] ?? '';
                            $last_name = $_POST['last_name'] ?? '';
                            $address = $_POST['address'] ?? '';
                            $gender = $_POST['gender'] ?? '';
                            $skills = $_POST['skills'] ?? [];
                            $department = $_POST['department'] ?? '';
                            
                            $title = '';
                            if ($gender === 'Male') {
                                $title = 'Mr.';
                            } elseif ($gender === 'Female') {
                                $title = 'Miss';
                            }

                            echo "<h4 class='mb-2 text-primary'>Thanks {$title} {$first_name} {$last_name}</h4>";
                            echo "<p class='text-muted mb-4'>Please Review Your Information:</p>";

                            echo "<div class='row mb-2'><div class='col-sm-4 fw-semibold text-secondary'>Name:</div><div class='col-sm-8'>{$first_name} {$last_name}</div></div>";
                            echo "<div class='row mb-2'><div class='col-sm-4 fw-semibold text-secondary'>Address:</div><div class='col-sm-8'> {$address} </div></div>";
                            
                            echo "<div class='row mb-2'><div class='col-sm-4 fw-semibold text-secondary'>Your Skills:</div><div class='col-sm-8'>";
                            if (!empty($skills)) {
                                foreach ($skills as $skill) {
                                    echo "{$skill} <br>";
                                }
                            } else {
                                echo "<span class='text-muted'>None selected</span><br>";
                            }
                            echo "</div></div>";
                            echo "<div class='row mb-2'><div class='col-sm-4 fw-semibold text-secondary'>Department:</div><div class='col-sm-8'>{$department}</div></div>";
                        } else {
                            echo "<div class='alert alert-warning text-center'>No Submissions</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>