@yield('layouts.master')

@section('leftbar')
<a class="score-card-button open glyphicon glyphicon-minus"></a>
  <div class="score-card">
    <table>
      <thead>
        <tr>
          <th class="score-card-table score-card-column-top">COMBOS</th>
          <th class="score-card-table">Player1</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < 13; $i++)
          <tr>
            @if ($i != 12)
              <td class="score-card-table score-card-column-mid" data-toggle="tooltip" data-container="body" data-placement="left" title="{{$jogos[2][$i]}}">
                {{$jogos[0][$i]}}
              </td>
            @else
              <td class="score-card-table score-card-column-bot" data-toggle="tooltip" data-container="body" data-placement="left" title="{{$jogos[2][$i]}}">
                {{$jogos[0][$i]}}
              </td>
            @endif
            <td class="score-card-table">
              {{$jogos[1][$i]}}
            </td>
          </tr>
        @endfor
      </tbody>
    </table>
  </div>
@stop