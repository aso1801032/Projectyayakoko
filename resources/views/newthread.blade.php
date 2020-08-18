@extends('layout.front')
@section('content')
<div class="container">
    <div class="row">
        <div class="newform card">
            <form id="form1" name="form1" method="post" action="/makesend" target="_self">
                {!! csrf_field() !!}
                <div class="form-group purple-border">
                <label for="exampleFormControlTextarea4">Title</label>
                <input class="form-control" name="title" id="title" rows="3">
                </div></br>
            
            <div class="form-group purple-border">
                <label for="exampleFormControlTextarea4">Content</label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                </div></br>

                <p>Tag</p>
                
                <input type="text" name="tag_name" id="tag_name" autocomplete="on" list="tag_id">
                    <datalist id="tag_id">
                    @foreach($tag as $t)
                        <option>{{$t->name}}</option>
                    @endforeach
                    </datalist>
                </br>

                <label for="exampleFormControlTextarea4">Default UserName</label>
                <div class="form-group purple-border">
                    <input class="username" name="username" id="username">
                </div>
                </br>
                <button style="background-color:#EEEEEE" type="submit" class="btn">
                <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection