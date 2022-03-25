<?php

session_start();
class Components
{
    public $username;
    public $app_name = "Sibulain";
    public $auth;

    function sidebar($username)
    {
        return '<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel">Sibulain</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="databuku.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="input.php">Tambah buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>

    <main>
        <nav class="navbar navbar-light bg-light">
            <div class="container">

                <div class="d-flex align-items-center">
                    <button type="button" class="navbar-toggler border-0" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand ms-1" href="#">Sibulain</a>
                </div>

                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-muted">' . $username . '</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="profile">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>

            </div>
        </nav>';
    }

    public function navbar()
    {
        if (isset($_SESSION['username'])) {
            $this->auth = '
            <a class="nav-link" href="keranjang.php" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                </svg>
            </a>
            <a class="nav-link" href="logout.php" role="button">Logout</a>
            ';
        } else {
            $this->auth = '
            <a class="nav-link" href="login.php" role="button">Login</a>
            <a class="btn btn-light" href="registrasi.php" role="button">Register</a>
            ';
        }

        return '<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="/">' . $this->app_name . '</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="/">Home</a>
                    <a class="nav-link" href="produk.php">Products</a>
                    <a class="nav-link" href="aboutbook.php">About Books</a>
                    ' . $this->auth . '
                </div>
                </div>
            </div>
            </nav>';
    }
}
