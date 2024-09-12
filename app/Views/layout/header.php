<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php 
$currentRoute = service('router')->methodName();

?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Task Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($currentRoute=="dashboard") { echo "active";} ?>" aria-current="page" href="<?php echo base_url(); ?>dashboard">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if($currentRoute=="newtask") { echo "active";} ?>" href="<?php echo base_url(); ?>newtask">New Task</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if($currentRoute=="profile") { echo "active";} ?>" aria-current="page" href="<?php echo base_url(); ?>profile">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>logout">Logout</a>
                        </li>
                    <?php else: ?>

                        <li class="nav-item">
                            <a class="nav-link <?php if($currentRoute=="login") { echo "active";} ?>" aria-current="page" href="<?php echo base_url(); ?>login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($currentRoute=="register") { echo "active";} ?>" href="<?php echo base_url(); ?>register">Register</a>
                        </li>

                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>