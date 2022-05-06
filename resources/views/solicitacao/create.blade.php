<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/app.css">
    <title>Criação</title>
</head>

<body  style="background-color: rgb(35, 86, 169)">
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-90">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem; height: 500px;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">SOLICITAÇÕES</h2>

                                <div class="form-outline form-white mb-4">
                                    <form method="POST" action="{{ route('solicitacao.store') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <table>
                                                <div name="selecione">
                                                    <label class="form-label" for="typeEmailX">Fornecedores</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="selecione">
                                                        <option value="0" selected>Selecione o fornecedor</option>
                                                        @foreach ($fornecedores as $fornecedor)
                                                            <option value="{{ $fornecedor->id }}">
                                                                <p>
                                                                    {{ $fornecedor->fornecedores }}
                                                                </p>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </table>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="typeEmailX">Data</label>
                                            <input type="date" class="form-control" id="fim_soli" name="data"
                                                placeholder="Date"
                                                value="{{ old('data') ?? \Carbon\Carbon::today()->format('Y-m-d') }}">
                                            <br>
                                        </div>
                                        <button type="submit" class="btn btn-outline-light btn-lg px-5">Salvar</button>
                                    </form>
                                    <br>
                                    <div class="">
                                        <a class="ms-auto btn btn-lg btn-outline-light"
                                            href="{{ route('solicitacao.index') }}">Voltar para a lista de
                                            Solicitacao</a>
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
