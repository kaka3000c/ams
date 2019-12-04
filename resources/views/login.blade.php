<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <div id="qrCode">

        </div>
        <script src="http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>
        <script>
            window.onload = function () {
                   var obj = new WxLogin({
                        id:"qrCode", 
                        appid:"wx8c55f8bae39de381", 
                        scope:"snsapi_base", 
                       redirect_uri:"/Callback",
                        state:"STATE",
                        style:"",
                        href:""
              });
            }


        </script>
    </body>
</html>
