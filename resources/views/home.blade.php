<!DOCTYPE html>
<html>
<head>
    <title>Car Service</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <home :clients="{{ json_encode($clients) }}" :filters="{{ json_encode($filters) }}"></home>
</div>
</body>
</html>