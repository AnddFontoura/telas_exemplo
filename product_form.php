<?php include_once('includes/header.php'); ?>
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
</style>


</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Telas Exemplo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product_form.php">Novo Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_setting.php">Meus Dados</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <form action="product_save.php" method="POST" enctype="multipart/form-data">
            <div class="album py-5">
                <div class="container">
                    <?php
                    form([
                        'name' => 'productName',
                        'id' => 'productNameId',
                        'type' => 'text',
                        'labelName' => 'Produto'
                    ]);
                    ?>
                    <div class="mb-3 row">
                        <label for="inputPrice" class="col-sm-2 col-form-label">Preço</label>
                        <div class="col-sm-10">
                            <input name="productPrice" type="number" class="form-control" id="inputPrice">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputSku" class="col-sm-2 col-form-label">SKU</label>
                        <div class="col-sm-10">
                            <input name="productSku" type="text" class="form-control" id="inputSku">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Descrição</label>
                        <div class="col-sm-10">
                            <textarea name="productDescription" class="form-control" id="inputDescription"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputImage" class="col-sm-2 col-form-label">Imagem</label>
                        <div class="col-sm-10">
                            <input name="inputImage" type="file" class="form-control" id="inputImage">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="btn btn-lg btn-success w-100" value="Salvar" id='formSubmit'>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.2/getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>


    <script src="js/bootstrap.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        $(document).ready( function() {
            console.log('carregou');
        });

        $('#formSubmit').hover(function() {
            let productForm = $('#productNameId');
            let productName = $('#productNameId').val();
            let submitButton = $("#formSubmit");
            let productNameRegex = new RegExp('[0-9]');

            if (productName.length < 10  || productNameRegex.test(productName) === true) {
                productForm.addClass('is-invalid');
                submitButton.addClass('disabled');
            }
        });

        $("#productNameId").on('change', function() {
            let productForm = $('#productNameId');
            let productName = $('#productNameId').val();
            let submitButton = $("#formSubmit");
            let productNameRegex = new RegExp('[0-9]');

            if (productName.length > 10) {
                productForm.removeClass('is-invalid');
                submitButton.removeClass('disabled');
            }
        })
    </script>


</body>

</html>