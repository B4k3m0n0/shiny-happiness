@yield('layouts.master')

@section('styles')
  @parent
  {{ HTML::style('css/lobby.css') }}
@stop

@section('mainbody')
  <div id="lobby" class="lobby" ng-controller="LobbyController">
    <table>
      <tr class="lobby-options" ng-repeat="firstKey in unsorted(options)">
        <td ng-class="{'lobby-clicked': $index == firstSelect, 'lobby-clicable': $index != firstSelect}" 
        ng-click="optionClick(firstKey, $index)">@{{firstKey}}</td>
        <td ng-class="{'lobby-clicked': $index == secondSelect, 'lobby-clicable': $index != secondSelect}" 
        ng-click="optionClick(secondKey[$index], $index)" ng-show="firstSelect != -1">@{{secondKey[$index]}}</td>
        <td colspan="2" rowspan="2" ng-show="$first && secondSelect != -1">
          <div class="selectables">
            <div ng-repeat="options in listOptions">
              <input type="text" class="capitalize" ng-hide="$last || options != 'game name'" placeholder="@{{options}}">
              <select class="form-control" ng-hide="$last || options == 'game name'">
                <option>@{{options}}</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <button type="submit" class="btn btn-info pull-right" ng-show="$last">@{{options}}</button>
            </div>
          </div>
        </td>
      </tr>











































      <tr>
        <td colspan="2" rowspan="6">GAME OWNER:
        </td>
        <td>Player1</td>
        <td>Player2</td>
      </tr>
      <tr>
        <td>Player3</td>
        <td>Player4</td>
      </tr>
      <tr>
        <td>Teste</td>
        <td>Teste</td>
      </tr>
      <tr>
        <td>Teste</td>
        <td>Teste</td>
      </tr>
      <tr>
        <td>Teste</td>
        <td>Teste</td>
      </tr>
      <tr>
        <td>Teste</td>
        <td>Teste</td>
      </tr>
    </table>
  </div>
@stop

@section('scripts')
  {{ HTML::script('js/lobby.js') }}
@stop
