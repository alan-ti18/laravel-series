<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>{{ $title }}</title>
</head>

<body>
	<div class="container">
		<h1 class="my-5">{{ $title }}</h1>

		{{ $slot }}
	</div>
</body>

</html>
