<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Static Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <!-- Alert containers -->
    <div class="alert alert-danger" role="alert" id="alert_danger" style="display: none;">
        <button type="button" class="btn-close" aria-label="Close" id="close_danger"></button>
        Invalid Username/Password!
    </div>

    <div class="alert alert-success" role="alert" id="alert_success" style="display: none;">
        <button type="button" class="btn-close" aria-label="Close" id="close_success"></button>
        Welcome to the System: <?php echo htmlspecialchars($_POST['floatingInput'] ?? ''); ?>
    </div>

    <!-- Form container -->
    <div class="round-container text-center" id="container">
        <div class="mb-4">
            <img src="img/blank-profile.png" alt="Profile Picture" class="profile-pic">
        </div>
        
        <form method="post" id="loginForm">
            <div class="mb-3">
                <select class="form-select" name="user_role">
                    <option value="admin">Admin</option>
                    <option value="content_manager">Content Manager</option>
                    <option value="system_user">System User</option>
                </select>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
                <label for="username">User Name</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <button type="submit" class="btn btn-primary">SIGN IN</button>
        </form>
    </div>

    <!-- JavaScript for handling alerts -->
    <script>
        document.getElementById('close_danger')?.addEventListener('click', function () {
            document.getElementById('alert_danger').style.display = 'none';
        });

        document.getElementById('close_success')?.addEventListener('click', function () {
            document.getElementById('alert_success').style.display = 'none';
        });
    </script>
</body>
</html>

<?php
// Centralized account data structure for better readability
$accounts = [
    "admin" => [
        ["username" => "admin", "password" => "Pass1234"],
        ["username" => "renmark", "password" => "Pogi1234"]
    ],
    "content_manager" => [
        ["username" => "pepito", "password" => "manaloto"],
        ["username" => "juan", "password" => "delacruz"]
    ],
    "system_user" => [
        ["username" => "juan", "password" => "delacruz"],
        ["username" => "pedro", "password" => "penduko"]
    ]
];

// Function to validate credentials
function validateCredentials($role, $username, $password, $accounts) {
    foreach ($accounts[$role] as $account) {
        if ($account['username'] === $username && $account['password'] === $password) {
            return true;
        }
    }
    return false;
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['user_role'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $alertType = validateCredentials($role, $username, $password, $accounts) ? 'success' : 'danger';
    
    if ($alertType === 'success') {
        echo '<script>document.getElementById("alert_success").style.display = "block";</script>';
    } else {
        echo '<script>document.getElementById("alert_danger").style.display = "block";</script>';
    }
}
?>
