<?php
$errors = [];
$first_name = "";
$last_name = "";
$address = "";
$country = "";
$gender = "";
$skills = [];
$username = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $address = $_POST['address'] ?? '';
    $country = $_POST['country'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $skills = $_POST['skills'] ?? [];
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';

    if (empty($first_name)) {
        $errors[] = "First Name is required.";
    }

    if (empty($last_name)) {
        $errors[] = "Last Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    
    if (empty($errors)) {
        $skills_str = implode(",", $skills);
        $line = "$first_name|$last_name|$email|$address|$country|$gender|$skills_str|$username";
        $file = fopen("clients.txt", "a");
        fwrite($file, $line . "\n");
        fclose($file);
        header("Location: view_clients.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white text-center py-3">
                        <h4 class="mb-0 text-primary">Registration</h4>
                    </div>
                    <div class="card-body px-4 py-4">

                        <?php
                        if (!empty($errors)) {
                            echo '<div class="alert alert-danger">';
                            echo '<ul class="mb-0">';
                            foreach ($errors as $error) {
                                echo "<li>$error</li>";
                            }
                            echo '</ul>';
                            echo '</div>';
                        }
                        ?>

                        <form action="registration.php" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Address</label>
                                <div class="col-sm-9">
                                    <textarea name="address" class="form-control" rows="3"><?php echo $address; ?></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Country</label>
                                <div class="col-sm-9">
                                    <select name="country" class="form-select">
                                        <option value="">Select Country</option>
                                        <option value="Egypt" <?php if ($country == "Egypt") echo "selected"; ?>>Egypt</option>
                                        <option value="USA" <?php if ($country == "USA") echo "selected"; ?>>USA</option>
                                        <option value="UK" <?php if ($country == "UK") echo "selected"; ?>>UK</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Gender</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>>
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Skills</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="skills[]" value="PHP" <?php if (in_array("PHP", $skills)) echo "checked"; ?>>
                                                <label class="form-check-label">PHP</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="skills[]" value="MySQL" <?php if (in_array("MySQL", $skills)) echo "checked"; ?>>
                                                <label class="form-check-label">MySQL</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="skills[]" value="J2SE" <?php if (in_array("J2SE", $skills)) echo "checked"; ?>>
                                                <label class="form-check-label">J2SE</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="skills[]" value="PostgreSQL" <?php if (in_array("PostgreSQL", $skills)) echo "checked"; ?>>
                                                <label class="form-check-label">PostgreSQL</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Department</label>
                                <div class="col-sm-9">
                                    <input type="text" name="department" class="form-control bg-light" value="OpenSource" readonly>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4 py-2 me-2">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary px-4 py-2">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="view_clients.php" class="btn btn-outline-primary">View All Clients</a>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
