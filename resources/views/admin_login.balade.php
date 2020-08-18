<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<div>
<table>
<form method="post" action="/admin/create">
    {{ csrf_field }}
    <th><input type="text" name="id">
    @if($errors->has('id'))
        <p>{{ $errors->first('id') }}</p>
    @endif</th>
    <th><input type="text" name="pass">
    @if($errors->has('pass'))
        <p>{{ $errors->first('pass') }}</p>
    @endif</th>
</form>
</table>

</div>

</body>