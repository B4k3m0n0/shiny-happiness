<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!--CSS LINKS-->
    <link href="./css/styles.css" rel="stylesheet">
    <style type="text/css">
      table, tr, td {
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
    <div>
      <table>
        @for ($i = 0; $i < 13; $i++)
          <tr>
            <td>
              {{array_keys($jogoPontos)[$i]}}
            </td>
            <td>
              {{array_values($jogoPontos)[$i]}}
            </td>
          </tr>
        @endfor
      </table>
    </div>
  </body>
</html>            