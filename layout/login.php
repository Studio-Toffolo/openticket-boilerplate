<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style type="text/css">
    html, body {
        min-height: 100vh;
    }

    body {
        background: #f3f0e7;
        background-image: url('https://images.unsplash.com/photo-1609155627149-8c6b32d4e222?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        font-family: 'Open Sans', sans-serif;
    }

    .studio-toffolo {
        text-decoration: none;
    }

    .studio-toffolo:hover {
        text-decoration: underline;
    }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,700;0,800;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">

    <title>Boilerplate app</title>
</head>
<body class="min-vh-100">

    <div class="container min-vh-100">
        <div class="row min-vh-100">
            <div class="col-10 offset-1 offset-md-3 col-md-6 min-vh-100 d-flex flex-column justify-content-center">

                    <div class="bg-white rounded-5 py-3 px-4 py-md-4 px-md-5 my-4 w-100">

                        <h1 class="display-6 mt-2 mb-3 fw-bold text-primary">App boilerplate</h1>

                        <p class="opacity-75 mb-5">Use this boilerplate to create your own app, and automate your own workflow on the go!</p>
                        <div class="text-center mt-5">
                            
                            <a href="index.php?connect" class="login-btn btn btn-primary btn-large px-4 py-3 w-100 rounded-pill">
                                SIGN IN
                            </a>

                            <p class="opacity-25 mt-4 mb-2">
                                Made with <i class="bi bi-heart"></i>
                                by
                                <a href="http://www.toffolo.studio?ref=<?php echo $app['id']; ?>" target="_blank" class="studio-toffolo text-black">
                                    Studio Toffolo
                                </a>
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    
</body>
</html>