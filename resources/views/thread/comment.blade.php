@extends('layout.front')
        @section('meta')
            <meta name="csrf-token" content="{{ csrf_token() }}">
        @endsection
        @section('title','スレッド')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <style>
            #new_thre{
            position: fixed;
            bottom: 15%;
            right: 4%;
          }
          #top{
            position: fixed;
            bottom: 10%;
            right: 4%;
          }
          #bottom{
            position: fixed;
            bottom: 5%;
            right: 4%;
          }
        </style>
        @section('name','スレッド')
        @section('content')
        <div class="container">
            <div class="row">
                <div class="Threads col-md-8">
                    <div class="main_card card">
                        <h1 id='thread_title'>{{$thread->title}}</h1>
                        <p>{{$thread->content}}
                        <div id='thread'></div>
                        <div class="md-form">
                            <input type="text" class="form-control" id='username'>
                            <label for="username">名前</label>
                        </div>
                        <div class="md-form">
                            <textarea class="md-textarea form-control" id='comment' rows='7'></textarea>
                            <label for="comment">コメントを入力！(必須)</label>
                        </div>
                        <input type="hidden" id='th' value={{$detail}}>
                        <div class="text-right">
                        <button id='ajax' style="background-color:#EEEEEE" class="btn"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
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

        <script>
        $(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }}
        );
            // Ajax button click
        $('#ajax').on('click',function(){
                $.ajax({
                    url:'./send',
                    type:'POST',
                    data:{
                        'comment':$('#comment').val(),
                        'thread':$('#th').val(),
                        'name':$('#username').val(),
                    }
                })
                // Ajaxリクエストが成功した時
                .done( (data) => {
                    alert('コメントを送信しました！');
                    console.log(data);
                })
                // Ajaxリクエストが失敗した時
                .fail( (data) => {
                    console.log(data);
                    alert('コメントの送信に失敗しました');
                })
                // Ajaxリクエストが成功・失敗どちらでも
                .always( (data) => {

                });
            });

        $(document).on('click','#high',function(){
            var high = $(this).val()
            $.ajax({
                url:'/high',
                type:'POST',
                data:{
                    'high_rating':high
                }
            })
            .done((data)=>{
                console.log('成功');
                console.log(data);
                $(this).prop("disabled","disabled");
            })
            .fail((data)=>{
                console.log('失敗');
                console.log(data);
            })
        })

        $(document).on('click','#low',function(){
            var low = $(this).val()
            $.ajax({
                url:'/low',
                type:'POST',
                data:{
                    'low_rating':low
                }
            })
            .done((data)=>{
                console.log('成功');
                console.log(data);
                $(this).prop("disabled","disabled");
            })
            .fail((data)=>{
                console.log('失敗');
                console.log(data);
            })
        })

        });



        function getdata(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }}
            );
            $.ajax({
                url:'./get',
                dataType:'json',
                type:'GET',
                data:{
                    'thread':$('#th').val(),
                }
            })
            //成功
            .done((data)=>{
                re = ""
                console.log(data);
                $.each(data['thread'],function(key,value){
                    $.each(value.comment,function(k,index){
                        if(!index.hide_setting){
                            re += "<hr>"+ index.thread_num + "  名前:" + index.name  +" ID:" + index.use_id +"<br>コメント: " + index.comment;        //ここ修正
                            //if($(''+index.com_num*10+1+'').prop('disabled')=='disabled'){
                            //    console.log(index.com_num+'がdisableです')
                            //}

                            var new1 = ''+index.com_num+'1';
                            if($('button[name="'+ new1 +'"]').prop('disabled')==true){
                                re += "<br><button id='high' name='"+ index.com_num +"1' value='"+ index.com_num +"' class='btn' disabled='disabled'>"+ index.high_rating + " <i class='fas fa-thumbs-up'></i> </button>";
                            }else{
                                re += "<br><button id='high' name='"+ index.com_num +"1' value='"+ index.com_num +"' class='btn'>"+ index.high_rating + " <i class='fas fa-thumbs-up'></i> </button>";
                            }
                            var new2 = ''+index.com_num+'2'
                            if($('button[name="'+ new2 +'"]').prop('disabled')==true){
                                re += "<button id='low' name='"+ index.com_num +"2' value='"+ index.com_num +"' class='btn' disabled='disabled'>"+ index.low_rating + " <i class='fas fa-thumbs-down'></i> </button>";
                            }else{
                                re += "<button id='low' name='"+ index.com_num +"2' value='"+ index.com_num +"' class='btn'>"+ index.low_rating + " <i class='fas fa-thumbs-down'></i> </button>";
                            }
                            var a = $('button[name="'+ new1 +'"]').prop('disabled')
                            console.log(a);
                        }else{
                            re += "<hr>非表示設定されているスレッドです。";
                        }
                        })

                        if(value.comment.length>=1000){
                            $('#comment').prop("disabled","disabled");
                            $('#username').prop("disabled","disabled");
                        }
                   })
                $('#thread').html(re);


                console.log("表示成功");
            })
            //失敗
            .fail((data)=>{
                console.log(data);
                console.log("表示失敗");
            })
        }

        $(document).ready(function()
        {
            setInterval('getdata()', 5000);
        });

        getdata();
        </script>
        @endsection
    </body>
</html>
