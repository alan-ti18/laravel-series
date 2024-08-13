<x-layout title="Séries">
	<a class="btn btn-dark mb-2" href="{{ route('series.create') }}">Adicionar</a>

	@isset($msgSuccess)
		<div class="alert alert-success">{{ $msgSuccess }}</div>
	@endisset

	<ul class="list-group">
		@foreach ($series as $serie)
			<li class="list-group-item d-flex justify-content-between align-items-center">{{ $serie->nome }}
				<div class="d-flex gap-2">
					<form method="get" action="{{ route('series.edit', $serie->id) }}">
						@csrf
						@method('PUT')
						<button class="btn btn-primary btn-sm">Editar</button>
					</form>
					<form method="post" action="{{ route('series.destroy', $serie->id) }}">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger btn-sm">Deletar</button>
					</form>
				</div>
			</li>
		@endforeach
	</ul>
</x-layout>
