<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Laravel</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/app.css">
</head>
<body >
<form action="/atualizar_candidato/{{$candidato->id}}" method="POST" style="margin: 0;
    padding: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
">

<!-- csrf é um recurso de segurança que impede a falsificação de solicitações entre sites. -->
    @csrf
    @method("PUT")
  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" name="nome_candidato"class="form-control" placeholder= "Digite seu nome aqui" value="{{$candidato -> nome}}">
  </div>
  <div class="mb-3">
    <label for="telefone"  class="form-label">Telefone</label>
    <input type="text" name="telefone_candidato" class="form-control" placeholder= "Digite seu número de telefone aqui" value="{{$candidato -> telefone}}">
  </div>
  <button type="submit" class="btn btn-success">Editar</button>
</form>
</body>
</html>