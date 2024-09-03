<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>{!! $title !!}</title>
</head>

<body>
	<div class="container">
		@isset($msgSuccess)
			<div class="alert alert-success"
				style="position: absolute; right: 16px; top: 8px; z-index: 9999; width: 40%; max-width: 500px">{{ $msgSuccess }}
			</div>
		@endisset

		@if ($errors->any())
			<div class="alert alert-danger mt-3"
				style="position: absolute; right: 16px; top: 8px; z-index: 9999; width: 40%; max-width: 500px">
				<ul>
					@foreach ($errors->all() as $error)
						<li style="list-style: none">{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
			@auth
				<a class="navbar-brand" href="{{ route('series.index') }}">Home</a>
				<a href="{{ route('logout') }}">Sair</a>
			@endauth
		</nav>
		<div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
			{{-- A notação {!! !!} permite que o blade interprete o conteúdo como HTML
			evitando que sejam apresentados códigos unicode como proteção de XSS --}}
			<h1 class="my-5">{!! $title !!}</h1>
			@if (isset($back))
				<a class="btn btn-dark px-5" href="{{ $back }}">Voltar</a>
			@endif
		</div>

		{{ $slot }}
	</div>
</body>

</html>
