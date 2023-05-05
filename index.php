<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Signin Template · Bootstrap v5.2</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script link="js/jquery.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form action="login.php" method="POST">
            <?php
            if (isset($error)) {
                echo '
                        <div class="alert alert-danger"> ' . $error . ' </div>
                    ';
            }
            ?>
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class='alert alert-danger' id='errorEmail' style='visibility: hidden'>
                E-mail em formato inválido
            </div>
            <div class="form-floating">
                <input name="loginEmail" type="email" class="form-control" id="floatingEmail" onChange="validateEmail()">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input name="loginPassword" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Senha</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" id='submitButton'>Logar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>


    <script>
        function validateEmail()
        {
            let email = document.getElementById('floatingEmail').value;
            let emailPattern = /[A-z0-9]{1,99}@[A-z09]{1,50}.\./;
            let error = 0;
            let submitButton = document.getElementById('submitButton');
            let emailForm = document.getElementById('floatingEmail');
            let errorEmail = document.getElementById('errorEmail');

            if (emailPattern.test(email) === false) {
                //alert('Email em formato inválido');
                emailForm.classList.add("invalid");
                error = 1;
            }

            if (error == 1) {
                submitButton.disabled = true;
                errorEmail.style.visibility = 'visible';
            } else {
                submitButton.disabled = false;
                errorEmail.style.visibility = 'hidden';
            }
        }
    </script>
</body>

</html>