<x-layout title="Nova Série">
	<a class="btn btn-dark" href="{{ route('series.index') }}">
		<< Voltar</a>
			<form action="{{ route('series.store') }}" method="post" class="mt-5 form-group">
				@csrf
				<div class="row">
					<div class="col-8">
						<label for="nome" class="form-label">Nome:</label>
						<input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" autofocus>
					</div>

					<div class="col-2">
						<label for="seasonsQtd" class="form-label">Nº Temporadas:</label>
						<input type="text" name="seasonsQtd" id="seasonsQtd" class="form-control" value="{{ old('seasonsQtd') }}">
					</div>

					<div class="col-2">
						<label for="episodes" class="form-label">Episódios por Temporada:</label>
						<input type="text" name="episodes" id="episodes" class="form-control" value="{{ old('episodes') }}">
					</div>
				</div>
				<button type="submit" class="btn btn-primary mt-3 py-2 px-5">
					Adicionar
				</button>
			</form>
</x-layout>
