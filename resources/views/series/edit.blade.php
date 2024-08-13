<x-layout title="Editar Série">
	<a class="btn btn-dark" href="{{ route('series.index') }}">
		<< Voltar</a>
			<form action="{{ route('series.update', $serie->id) }}" method="post" class="mt-5 form-group">
				@csrf
				@method('PUT')
				<label for="nome" class="form-label">Nome:</label>
				<input type="text" name="nome" id="nome" class="form-control" value="{{ $serie->nome }}">
				<button type="submit" class="btn btn-primary mt-3 py-2 px-5">Editar</button>
			</form>
</x-layout>
