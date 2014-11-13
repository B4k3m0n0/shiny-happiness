@yield('layouts.master')

@section('styles')
  @parent
  {{ HTML::style('css/score-card.css') }}
@stop

@section('leftbar')
<div class="leftbar col-md-2">
  <a class="score-card-button open fa fa-minus"></a>
  <div class="score-card open">
    <table>
      <thead>
        <tr>
          <th class="score-card-table">COMBOS</th>
          <th class="score-card-table">Player1</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < 13; $i++)
          <tr>
            <td class="score-card-table" data-toggle="tooltip" data-container="body" data-placement="left" title="{{$jogos[2][$i]}}">
              {{$jogos[0][$i]}}
            </td>
            <td class="score-card-table">
              {{$jogos[1][$i]}}
            </td>
          </tr>
        @endfor
      </tbody>
    </table>
  </div>
</div>
@stop