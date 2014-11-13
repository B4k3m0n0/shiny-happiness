@yield('layouts.master')

@section('styles')
  @parent
  {{ HTML::style('css/navbar.css') }}
@stop

@section('navbar')
  <div class="container">
    <div class="navbar-header">
      <span class="navbar-brand">YAHTZEE</span>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li>
      	<a class="navbar-link">Algodão</a>
      </li>
      <li>
        <a class="navbar-link">Púcaro</a>
      </li>
      <li>
      	<a class="navbar-link">Cadeirão</a>
      </li>
    </ul>
  </div>
@stop