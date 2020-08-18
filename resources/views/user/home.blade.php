@extends('layout.front')
@section('content')
<div class="container">
    <div class="row">
        <div class="Threads col-md-8">
                @foreach($data as $th)
            <div class="main_card card">
                <h4 class="card-title">
                <a class="title" href="/detail?thread={{$th->id}}"><strong>{{$th->title}}</strong></a></h4>
                <P>{{$th->content}}</p>
                <div style="text-align: right">
                    tag：
                    <a class="atag" href="#">{{optional($th->tag)->name}}</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="r col-md-4">
            <div class="left_card card">
                <h4 class="card-title">tags</h4>
                @foreach($tag as $t)
                    <a class="tags" href="#">{{$t->name}}</a>
                @endforeach
            </div>
            <div class="right_card card">
                <h4 class="card-title">menue</h4>
                <a class="tags" href="#">Information</a>
                <a class="tags" href="#">使い方</a>
                <a class="tags" href="#">問い合わせ</a>
            </div>
        </div>
    </div>
</div>
@endsection
