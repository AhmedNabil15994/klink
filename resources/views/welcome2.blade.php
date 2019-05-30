<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Document</title>
</head>

<body>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
        var module = { }; /*   <-----THIS LINE */
    </script>
    <script src="/plugins/echo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <script>
        window.io = io;

        window.Echo = new Echo({
            broadcaster: 'socket.io',
            host: window.location.hostname + ':6001',
            auth:{
                headers:{
                    orderId : 5
                }
            }
            
            
        });
        var channel = Echo.join(`orders`)
            .here((users) => {
                
                console.log(users)
            })
            .joining((user) => {
                console.log(user);
            })
            .leaving((user) => {
                console.log(user);
            }).listenForWhisper('typing', (e) => {
        console.log(e.name,'typing');
    });
    setTimeout(function(){
        channel.whisper('typing', {
                name: 'ahmed ali '
    })
    },500)
    </script>
   
</body>

</html>