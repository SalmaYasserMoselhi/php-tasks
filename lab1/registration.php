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
                        <form action="form-response.php" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="first_name" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Address</label>
                                <div class="col-sm-9">
                                    <textarea name="address" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Country</label>
                                <div class="col-sm-9">
                                    <select name="country" class="form-select">
                                        <option value="">Select Country</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="USA">USA</option>
                                        <option value="UK">UK</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Gender</label>
                                <div class="col-sm-9 d-flex align-items-center">
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" required>
                                        <label class="form-check-label" for="genderMale">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" required>
                                        <label class="form-check-label" for="genderFemale">Female</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Skills</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="skills[]" value="PHP" id="skillPHP">
                                                <label class="form-check-label" for="skillPHP">PHP</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="skills[]" value="MySQL" id="skillMySQL">
                                                <label class="form-check-label" for="skillMySQL">MySQL</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="skills[]" value="J2SE" id="skillJ2SE">
                                                <label class="form-check-label" for="skillJ2SE">J2SE</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="skills[]" value="PostgreSQL" id="skillPgSQL">
                                                <label class="form-check-label" for="skillPgSQL">PostgreSQL</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label fw-semibold">Department</label>
                                <div class="col-sm-9">
                                    <input type="text" name="department" class="form-control bg-light" value="OpenSource" readonly>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="me-3 text-center">
                                            <div class="fw-bold mb-1 p-2 bg-dark text-white rounded font-monospace tracking-wide">ShG8Gu</div>
                                            <input type="text" name="captcha" class="form-control text-center mx-auto" style="width: 90px;" required>
                                        </div>
                                        <div class="small text-muted lh-sm">
                                            Please insert the<br>code the below<br>box
                                        </div>
                                    </div>
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
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
