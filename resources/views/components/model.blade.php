<!DOCTYPE html>
<html>
<head>
    <title>Visor 3D</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/model.js']) <!-- apunta a la ruta de model.js -->
    <style>
        body { margin: 0; }
        canvas { display: block; }
    </style>
</head>
<body>
    <div id="contenedor" class="w-full h-full justify-center" ></div>
</body>
</html>
