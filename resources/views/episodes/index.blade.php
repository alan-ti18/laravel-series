<x-layout title="Episódios da {!! $season->number !!}ª Temporada">
	<form action="{{ route('episodes.store', $season->id) }}" method="post">
		@csrf
		<ul class="list-group">
			@foreach ($episodes as $episode)
				<li class="list-group-item d-flex justify-content-between align-items-center">Episódio {{ $episode->number }}
					<input type="checkbox" name="episodes[]" id="episode" value="{{ $episode->id }}" style="cursor: pointer">
					{{-- Ao colocar o indicador de Array no atributo 'name', o PHP já trata o dado como array ao ser passado --}}
				</li>
			@endforeach
		</ul>

		<button type="submit" class="btn btn-primary mt-3">Salvar</button>
	</form>
</x-layout>
