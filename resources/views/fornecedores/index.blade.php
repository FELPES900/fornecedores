<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Fornecedores</title>
</head>

{{-- visualização do usuario --}}

<body>
    {{-- <h1>Hello, world!</h1> --}}

    <div class="d-flex flex-column flex-md-row">
        <div class="color">
            <div class="mt-3 d-flex align-items-center">
                <a class=" btn btn-lg w-100 btn-outline-light" href="{{ route('solicitacao.index') }}">Solicitações</a>
            </div>
            <div class="mt-3 d-flex align-items-center">
                <a class=" btn btn-lg w-100 btn-outline-light" href="{{ route('produtos.index') }}">Produtos</a>
            </div>
            <div class="mt-3 align-items-start">
                <a class=" btn btn-lg w-100 btn-outline-light" href="layout">Inicio</a>
            </div>
        </div>
        <div class="forne flex-fill text-white" style="background-color: rgb(0, 0, 0)">
            <div class="d-flex justify-content-center">
                <h2 class=" mt-4 fw-bold mb-2 text-uppercase">Fornecedores</h2>
            </div>
            <table class="table table-houver text-white" style="margin-right:;">
                {{-- exemplo de como tem que ser --}}
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Fornecedores</th>
                    </tr>
                </thead>
                @forelse ($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->id }}</td>
                        <td>{{ $fornecedor->fornecedores }}</td>
                        <td>
                            <a class="btn btn-success"
                                href="{{ route('fornecedores.edit', $fornecedor->id) }}">Editar</a>
                            <form style="display: inline"
                                action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir o Fornecedor?')">Deletar</button>

                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        Nenhum Fornecedor cadastrado
                    </tr>
                @endforelse
            </table>
            <button type="button" class="btn btn-primary">
                <a class="text-decoration-none text-white" href=" {{ route('fornecedores.create') }} ">Cadastrar
                    Fornecedor</a>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>