@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="adm/delete">
        @csrf
            <th><input type="text" name="id">
            @if($errors->has('id'))
                <p>{{ $errors->first('id') }}</p>
            @endif</th>
            <input type="submit" name="button" value="送信">
        </form>
    </div>
