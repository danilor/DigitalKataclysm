<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ "500 - Service currently unavailable" }}</title>
    @include("errors.styles")
</head>
<body>
<div class="cover">
    <h1>Webservice currently unavailable <small>Error 500</small></h1>
    <p class="lead">An unexpected condition was encountered.<br />Our service team has been dispatched to bring it back online.</p>
    <p class="lead">{{ @$err->getPrevious()->getMessage()  }} in {{ @$err->getPrevious()->getFile() }} line {{ $err->getPrevious()->getLine() }}</p>
</div>
</body>
</html>