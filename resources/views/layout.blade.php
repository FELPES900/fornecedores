<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Fornecedor</title>
</head>

<body style="width: 99.2%;">

    <nav>
        <div class="row forne">
            <div class="col-2">
                <div class="color">
                    <div class="mt-3 align-items-start">
                        <a class=" btn w-100 btn-lg btn-outline-light" href="{{ route('fornecedores.index') }}">Fornecedores</a>
                    </div>
                    <div class="mt-3 d-flex align-items-center">
                        <a class=" btn btn-lg w-100 btn-outline-light"
                            href="{{ route('solicitacao.index') }}">Solicitações</a>
                    </div>
                    <div class="mt-3 d-flex align-items-center">
                        <a class=" btn btn-lg w-100 btn-outline-light"
                            href="{{ route('produtos.index') }}">Produtos</a>
                    </div>
                </div>
            </div>
            <div class="col-10 inicio">

            </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
