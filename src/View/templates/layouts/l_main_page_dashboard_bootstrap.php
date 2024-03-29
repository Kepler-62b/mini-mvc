<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ADVERTS-BOARD</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link href="/css/assets/dist/css/bootstrap.min.css" rel="stylesheet">

<!--    <style>-->
<!--        .bd-placeholder-img {-->
<!--            font-size: 1.125rem;-->
<!--            text-anchor: middle;-->
<!--            -webkit-user-select: none;-->
<!--            -moz-user-select: none;-->
<!--            user-select: none;-->
<!--        }-->
<!---->
<!--        @media (min-width: 768px) {-->
<!--            .bd-placeholder-img-lg {-->
<!--                font-size: 3.5rem;-->
<!--            }-->
<!--        }-->
<!--    </style>-->

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

</head>

<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">ADVERTS-BOARD</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <?= $w_navigation_bootstrap ?>
            </div>
            <div class="border-top my-3"></div>
            <?= $w_form_get_bootstrap ?>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <!--            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">-->
            <!--                <h1 class="h2">Dashboard</h1>-->
            <!--                <div class="btn-toolbar mb-2 mb-md-0">-->
            <!--                    <div class="btn-group me-2">-->
            <!--                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>-->
            <!--                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>-->
            <!--                    </div>-->
            <!--                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">-->
            <!--                        <span data-feather="calendar"></span>-->
            <!--                        This week-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->

            <!--            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->

            <?= $content ?>

        </main>
    </div>
</div>


<!--<script src="./css/assets/dist/js/bootstrap.bundle.min.js"></script>-->

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
<script src="/css/dashboard.js"></script>

</body>
</html>
