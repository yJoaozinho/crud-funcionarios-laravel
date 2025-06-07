<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Lista de Funcionários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead {
            background-color: #dee2e6;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4 text-center text-secondary">Lista de Funcionários</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('funcionarios.create') }}" class="btn btn-success">+ Adicionar Funcionário</a>
        </div>

        <table class="table table-striped table-bordered table-hover shadow-sm">
            <thead class="table-secondary">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Telefone</th>
                    <th>Gênero</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->cpf }}</td>
                        <td>{{ \Carbon\Carbon::parse($funcionario->data_nascimento)->format('d/m/Y') }}</td>
                        <td>{{ $funcionario->telefone }}</td>
                        <td>{{ $funcionario->genero }}</td>
                        <td>
                            <a href="{{ route('funcionarios.edit', $funcionario->cpf) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('funcionarios.destroy', $funcionario->cpf) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Nenhum funcionário cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
