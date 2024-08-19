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
		<h1 class="my-5">{!! $title !!}</h1> {{-- A notação {!! !!} permite que o blade interprete o conteúdo
													como HTML evitando que sejam apresentados códigos unicode como proteção de XSS --}}

		{{ $slot }}
	</div>
</body>

</html>
