<!DOCTYPE html>
<html>
  <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <!--CSS LINKS-->
        <link href="./css/styles.css" rel="stylesheet">
    </head>
    <body>
        <div>
            {{ Form::open() }}
            @for ($i = 0; $i < 5; $i++)
                {{ Form::text('dado'.($i+1) , Input::old('dado')) }}
            </br>
            @endfor
            {{ Form::submit('Submit') }}
            {{ Form::close() }}
        </div>
    </body>
</html>