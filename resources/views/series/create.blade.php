<x-layout title="Nova Série">
	<a class="btn btn-dark" href="{{ route('series.index') }}">
		<< Voltar</a>
			<form action="{{ route('series.store') }}" method="post" class="mt-5 form-group">
				@csrf
				<label for="nome" class="form-label">Nome:</label>
				<input type="text" name="nome" id="nome" class="form-control">
				<button type="submit" class="btn btn-primary mt-3 py-2 px-5">Enviar</button>
			</form>
</x-layout>
