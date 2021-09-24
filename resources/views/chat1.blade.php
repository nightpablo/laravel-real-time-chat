@extends('base')

@section('content')
    <div class="card direct-chat direct-chat-warning">
        <div class="card-header">
            <h3 class="card-title">Estas chateando con el chat 2</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">


                <div class="direct-chat-msg">
                </div>

            </div>
        </div>
        <div class="card-footer">
            <form action="#" method="post">
                @csrf
                <div class="input-group">
                    <input type="hidden" name="sendTo" value="chat2" />
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control" />
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-warning">Send</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')

    <script>
        $('form').on('submit', function(e) {
            e.preventDefault();
            var sendTo = $(this).find('input[name=sendTo]').val();
            var message = $(this).find('input[name=message]').val();
            $.ajax({
                url:'/sendchat',
                data: {"sendTo":sendTo, "message": message, "_token": "{{ csrf_token() }}"},
                type:'post',
                success: function(data){
                    // console.log();
                },
            });
        })
    </script>
    <script>

        Echo.channel('events')
                .listen('RealTimeMessage', (e) => {
                    console.log(e.sendTo);
                    
                    if ( e.sendTo == "chat1" ) {
                        myDiv = '<div class="direct-chat-msg">'+
                                    '<div class="direct-chat-infos clearfix">'+
                                        '<span class="direct-chat-name float-left">Chat 2</span>'+
                                        '<span class="direct-chat-timestamp float-right">24 Sep 14:30</span>';
                    } else {
                        myDiv = '<div class="direct-chat-msg right">'+
                                    '<div class="direct-chat-infos clearfix">'+
                                        '<span class="direct-chat-name float-right">Chat 1</span>'+
                                        '<span class="direct-chat-timestamp float-left">24 Sep 14:30</span>';
                    }

                    myDiv+=         '</div>'+
                                    '<div class="direct-chat-text">'+
                                        e.message+
                                    '</div>'+
                                '</div>';


                        $('.direct-chat-messages').append(myDiv);

                });

    </script>
@endsection
