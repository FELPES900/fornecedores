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

<body style="background-color: rgb(35, 86, 169)">
    <section>
        <div class="container py-5 h-100">
            <div class="align-items-center h-90">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white"
                        style="border-radius: 1rem;width: 1100px; height: 500px;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Novo produto a solicitação</h2>
                                <div class="form-outline form-white mb-4">
                                    <form method="POST" action="{{ route('soli_prod.store', $solicitacao->id) }}">
                                        @csrf
                                        <div class="mb-3">
                                            <table class="table table-dark table-striped">
                                                <br>
                                                <thead class="text-white">
                                                    <tr>
                                                        <th scope="col">Codigo</th>
                                                        <th scope="col">Nome</th>
                                                        <th scope="col">Unidade</th>
                                                        <th scope="col">Valor</th>
                                                    </tr>
                                                </thead>
                                                @foreach ($solicitacao->produtos as $fim_soli)
                                                    <tr class="text-white">
                                                        <td>{{ $fim_soli->id }}</td>
                                                        <td>{{ $fim_soli->name }}</td>
                                                        <td>{{ $fim_soli->unidade }}</td>
                                                        <td>{{ $fim_soli->valor }}</td>
                                                        <td>
                                                            <form style="display: inline" action="{{ route('soli_prod.destroy', $solicitacao->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                
                                                                <input type="hidden" name="idProduto" value="{{ $fim_soli->id}}">
                                                                <button type="submit" class="btn btn-danger"
                                                                    onclick="return confirm('Tem certeza que deseja excluir o produto?')">Deletar</button>
                                
                                                            </form>
                                                            {{-- <form style="display: inline" action="{{ route('solicitacao.destroy', $fim_soli->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                
                                                                <button type="submit" class="btn btn-danger"
                                                                    onclick="return confirm('Tem certeza que deseja excluir o Fornecedor?')">Deletar</button>
                                
                                                            </form> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                        <button type="" class="d-flex justifty-content-end btn btn-outline-light btn-lg px-5">
                                            <a class="text-decoration-none text-white" href="{{route('solicitacao.edit',$solicitacao->id)}}"> Salvar</a>
                                        </button>
                                    </form>
                                    <div class="mt-2 d-flex justify-content-start">
                                        <a class="ms-auto btn btn-outline-light btn-lg" data-bs-toggle="modal"
                                            data-bs-target="#CriarPro" data-bs-whatever="@mdo">Adicionar Produto</a>
                                    </div>
                                    <br>
                                    {{-- <div class="">
                                        <a class="ms-auto btn btn-lg btn-outline-light"
                                            href="{{ route('solicitacao.index') }}">Voltar para a lista de
                                            Solicitacao</a>
                                    </div> --}}
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

    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    <form method="POST" action="{{route('soli_prod.store',$solicitacao->id)}}">
        @csrf
        <div class="modal fade" id="CriarPro" tabindex="-1" aria-labelledby="CriarPro" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">PRODUTOS</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Novo produto da solicitação</label>
                            <select class="form-select mb-3" name="produto" id="">
                                @foreach ($produtos as $fim_prod)
                                    <option value="{{$fim_prod->id}}">
                                        <p>
                                            {{$fim_prod->name}}
                                        </p>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="mb-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <input type="hidden" value="{{ $fim_prod->id }}" name="produto"> --}}
    </form>
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////// --}}
</body>

</html>
