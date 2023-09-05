<h2>Alterar Cidade</h2>
<form action="{{ route('cidades.update', $dados['id']) }}" method="POST">
   <!-- Token de Segurança -->
   <!-- Define o método de submissão como PUT -->
   @csrf
   @method('PUT')
   <a href="{{route('cidades.index')}}"><h4>voltar</h4></a>
   <label>Nome: </label> <input type='text' name='nome' value='{{$dados['nome']}}'>
   <select name="porte">
		<option value="Pequeno">Pequeno</option>
		<option value="Medio">Medio</option>
		<option value="Grande">Grande</option>
	</select>
   
   <input type="submit" value="Salvar">
</form>