<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/app.css">
    <title>Edição</title>
</head>

<body style="background-color: rgb(35, 86, 169);">
    <section class=" vh-100 gradient-custom">
        <div class="container py-5 h-97">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12  ">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Editando Solicitação</h2>
                                <br>
                                <div class="form-outline form-white mb-4">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('solicitacao.update', $fim_soli->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-start">
                                            <div class="col-7">
                                                <label class="form-label" for="typeEmailX">Fornecedores</label>
                                                <table>
                                                    <div name="selecione">
                                                        <select class="form-select"
                                                            aria-label="Default select example" name="selecione">
                                                            @foreach ($fornecedores as $fornecedor)
                                                                <option value="{{ $fornecedor->id }}"
                                                                    @selected($fim_soli->fornecedor->id === $fornecedor->id)>
                                                                    {{ $fornecedor->fornecedores }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </table>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label" for="typeEmailX">Data</label>
                                                <input type="date" class="form-control" id="fim_soli" name="data"
                                                    placeholder="Date"
                                                    value="{{ $fim_soli->getRawOriginal('data') ?? \Carbon\Carbon::today()->format('Y-m-d') }}">
                                            </div>
                                            <div class="col-2 align-self-end">
                                                <button type="submit"
                                                    class="btn btn-outline-light btn-lg px-5">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div style="margin-top: 30px" class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="buttom" class="btn btn-outline-light btn-lg px-5">
                                                <a class="text-decoration-none text-white"
                                                    href=" {{ route('soli_prod.create') }} ">Adicionar Produto</a>
                                            </button>
                                        </div>
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
