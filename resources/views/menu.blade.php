<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Classificados Eróticos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/cadastro">cadastro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/login">login</a>
      </li>
    </ul>
    @isset($user)
    <ul class="navbar-nav float-right">
      <li class="nav-item">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong>Usuário: </strong> {{$user->name}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="/user/anuncios">Meus anúncios</a>
          <a class="dropdown-item" href="/user/editar-cadastro">Meu cadastro</a>
          <a class="dropdown-item" href="/user/logout">Sair</a>
        </div>
      </div>
      </li>
    </ul>
    @endisset
  </div>
</nav>