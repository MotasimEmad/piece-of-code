<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bg-light">
  <div class="container">
    <img class="ax-center my-10 w-24" src="https://assets.bootstrapemail.com/logos/light/square.png" />
    <div class="card p-6 p-lg-10 space-y-4">
      <h1 class="h3 fw-700">
        {{ $name }}
      </h1>
      <p>
        {{ $body }}
      </p>
      <a class="btn btn-primary p-3 fw-700" href="https://app.bootstrapemail.com/templates">Visit Website</a>
    </div>
  </div>
</body>
</html>