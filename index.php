<!DOCTYPE html>
<html lang="zh">
<head>
  <title>HTML Tutorial</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="chatsystem/style.css"/>
  <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
</head>
<body>




    <div id="wrapper">
        <h1>來聊天吧</h1>
        <div class="chatwrapper">
            <div id="chat"></div>
            <form method="post" id="messageFrm">
                <textarea name="message"  rows="7"  cols="30" class="textarea">
                </textarea>
            </form>

        </div>
    </div>
    <script>
        LoadChat();
        setInterval(function(){
            LoadChat();
        },10000);
        function LoadChat(){
            $.post('/chatsystem/handlers/message.php?action=getMessage',function(response){
                $('#chat').html(response);

                // 文字過多時可以保持捲動到最下面
                $('#chat').scrollTop($('#chat').prop('scrollHeight'));
            });
        }
        $('.textarea').keyup(function(e){
                if(e.which==13) {
                    //按下enter
                    $('form').submit();
                }
        });
        $('form').submit(function(){
            let message=$('.textarea').val();
            $.post('/chatsystem/handlers/message.php?action=sendMessage&message='+message,
            function(response){
                if (response==1) {
                    LoadChat();
                    document.getElementById('messageFrm').reset();
                }
            });
            return false;//不重新整理畫面
        });
    </script>


</body>
</html>
