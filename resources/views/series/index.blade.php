<x-layout title="Séries" :msgSuccess="$msgSuccess">
	<a class="btn btn-dark mb-2" href="{{ route('series.create') }}">Adicionar</a>

	@if (count($series) > 0)
		<ul class="list-group">
			@foreach ($series as $serie)
				<li class="list-group-item d-flex justify-content-between align-items-center"><a
						href="{{ route('seasons.index', $serie->id) }}">{{ $serie->nome }}</a>
					<div class="d-flex gap-2">
						<a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">Editar</a>
						<form method="post" action="{{ route('series.destroy', $serie->id) }}">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger btn-sm">Deletar</button>
						</form>
					</div>
				</li>
			@endforeach
		</ul>
	@else
		<p class="mt-5 text-center text-gray-500">Ainda não há séries cadastradas. Clique <a
				href="{{ route('series.create') }}">aqui</a>
			para cadastrar uma.</p>
	@endif
</x-layout>
