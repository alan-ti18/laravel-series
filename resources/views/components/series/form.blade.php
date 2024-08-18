<form action="{{ $action }}" method="post" class="mt-5 form-group">
	@csrf
	@isset($nome)
		@method('PUT')
	@endisset
	<label for="nome" class="form-label">Nome:</label>
	<input type="text" name="nome" id="nome" class="form-control"
		@isset($nome) value="{{ $nome }}" @endisset>
	<button type="submit" class="btn btn-primary mt-3 py-2 px-5">
		@if (@isset($nome))
			Editar
		@else
			Adicionar
		@endif
	</button>
</form>
