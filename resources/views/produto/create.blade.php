<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/app.css">
    <title>Create</title>
</head>

<body style="background-color: rgb(35, 86, 169);">
    {{-- <body style="background-image: url(../img/forne.jpg); background-repeat: no-repeat; background-size: cover; background-position: center;"> --}}
    <section class="vh-100 gradient-custom">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem; height: 650px;">
                        <div class="card-body p-6 text-center">
                            <div class="mb-md-6 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">NOVO PRODUTO</h2>
                                <br>
                                <div class="form-outline form-white mb-4">
                                    <div class="mb-3">
                                        
                                        <form class="form-horizontal" method="POST" action="{{ route('produtos.store') }}">
                                            @csrf

                                            {{-- //////////////////////NOME DO PRODUTO///////////////////////////// --}}
                                            <label class="d-flex justifty-content-end form-label"
                                                for="typeEmailX">Descrição do produto</label>
                                            <input type="text" class="form-control" id="fornecedores" name="name"
                                                placeholder="Descrição do produto" value="">

                                            {{-- /////////////////////UNIDADE DO PRODUTO////////////////////////// --}}
                                            <br>
                                            <label class="d-flex justifty-content-end form-label"
                                                for="typeEmailX">Unidade</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="unidade" id="">
                                                <option value="" selected>Selecione a unidade de medida</option>
                                                @foreach ($pordutosUni as $uni_fim)
                                                    <option value="{{$uni_fim}}">
                                                        <p>
                                                            {{ $uni_fim }}
                                                        </p>
                                                    </option>
                                                @endforeach
                                            </select>
                                            <br>
                                            
                                            <label class="d-flex justifty-content-end form-label"
                                                for="typeEmailX">Valor do produto</label>
                                            <input class="form-control" id="valor" type="number" name="valor">

                                            {{-- //////////////////////VALOR DO PRODUTO////////////////////////////// --}}
                                            <br>
                                            <label class="d-flex justifty-content-end form-label"
                                                for="typeEmailX">Especificações</label>
                                            <input type="text" class="form-control" id="descricao" name="descricao"
                                                placeholder="descrição" value="">
                                            <br>
                                                <button type="submit" class="btn btn-outline-light btn-lg ">Salvar</button>
                                        </form>



                                    </div>
                                    <div class="">
                                        <a class="ms-auto btn btn-lg btn-outline-light"
                                            href="{{ route('produtos.index') }}">Voltar para a lista de
                                            Produtos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
