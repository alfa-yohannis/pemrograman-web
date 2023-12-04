<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body>
        <h1>Temperature</h1>
        <h2 id="device-01">Device 01: 0 </h2>
        <h2 id="device-02">Device 02: 0 </h2>

        <script>
            setTimeout(() => {
                window.Echo1.channel("sensor01")
                 .listen("NewTemperature", (e) => {
                    var element = document.getElementById("device-01");
                    element.innerHTML = "Device 01: " + e.message;
                    //console.log("Echo 1: " + e.message);
                });
            }, 200);

            setTimeout(() => {
                window.Echo2.channel("sensor02")
                 .listen("NewTemperature", (e) => {
                    var element = document.getElementById("device-02");
                    element.innerHTML = "Device 02: " + e.message;
                    //console.log("Echo 2: " + e.message);
                });
            }, 200);
        </script>
    </body>
</html>
