<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <style>
    body { background: #F5F7FB !important; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">

            <div class="d-flex justify-content-between w-100 mb-4">

                <div>
                    <span class="d-block opacity-50"><?php echo $boilerplate_me->company->name; ?></span>
                    <h5 class="fw-bold mt-0 opacity-75">Welcome back, <?php echo $boilerplate_me->user->name; ?></h5>
                </div>

                <div class="text-end mb-3">
                    <a href="?logout" class="btn btn-secondary btn-sm rounded-pill px-3">
                        <i class="bi bi-box-arrow-right"></i>
                        Log out
                    </a>
                </div>
            </div>

            <nav class="nav nav-pills">
            <?php
            $page_title = '';

            $directory = 'pages';
            if (!is_dir($directory))
            {
                echo "Directory /pages not found";
            }

            $currentPage = isset($_GET['p']) ? $_GET['p'] : '';

            $files = array_diff(scandir($directory), ['.', '..']);
            foreach ($files as $file)
            {
                if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
                    continue;
                }

                $fileName = pathinfo($file, PATHINFO_FILENAME);
                if( $fileName === $currentPage )
                {
                    $page_title = str_replace("_", " ", ucfirst($fileName) );
                    $activeClass = 'active';
                } else {
                    $activeClass = '';
                }

                echo '<a class="nav-link ' . $activeClass . '" href="index.php?p=' . $fileName . '">' . str_replace("_", " ", ucfirst($fileName) ) . '</a>';
            }
            ?>
            </nav>

            <h1 class="display-4 fw-bold mt-4"><?php echo $page_title; ?></h1>
            <div class="bg-white rounded p-4 mb-4">