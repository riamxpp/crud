<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar informações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <main class="container">
      <form method="POST" action="{{route('user.update', $user->id)}}">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" name="nome" class="form-control" value="{{$user->name}}" id="name" aria-describedby="emailHelp" placeholder="Insiria seu Nome">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" name="email" class="form-control" value="{{$user->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Insira seu email">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
      </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>