@section('styles')
  @parent
  {{ HTML::style('css/navbar.css') }}
@stop

@section('navbar')
  <div class="container">
    <div class="navbar-header">
      <span class="navbar-brand">YAHTZEE</span>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="fa fa-bars"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse navbar-responsive-collapse">
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
  </div>
@stop