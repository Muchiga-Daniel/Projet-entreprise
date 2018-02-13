<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"></ul>
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">@lang('Acceuil')</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">@lang('Contact')</a></li>
    </ul>
  </div>
</nav>
