
<div class="container">
	<form action="index.php?action=result" method="post">
	<br>
	<!-- Definição do nome da classe -->
	<p align="center"><font size="6">Nome da Classe</font></p>
	<table align="center" width="300px">
		<tr>
			<td>
				<input type="text" id="nome-class" class="form-control" name="nomeclass" placeholder="Nome da classe">
			</td>
		</tr>
	</table>
	<!-- Fim definição do no nome da classe -->
	<p align="center"><font size="6">Métodos</font></p>

		<!-- Opições de métodos da classe -->
		<table align="center" width="300px">
			<tr>
				<td align="right" width="100px">
					<font>CONSTRUTOR</font>
				</td>
				<td width="20px">
					<input type="checkbox" name="construtor" style="width: 18px; height:18px; border-radius: 5px 5px; border: 1px solid #000000;" checked>
				</td>

				<td align="right" width="100px">
					<font>GET'S</font>
				</td>
				<td width="20px">
					<input type="checkbox" name="gets" style="width: 18px; height:18px; border-radius: 5px 5px; border: 1px solid #000000;" checked>
				</td>

				<td align="right" width="100px">
					<font>SET'S</font>
				</td>
				<td width="20px">
					<input type="checkbox" name="sets" style="width: 18px; height:18px; border-radius: 5px 5px; border: 1px solid #000000;">
				</td>
			</tr>
		</table>
		<!-- Fim Opições de métodos da classe -->
		<br>
		<p align="center"><font size="6">Atributos</font></p>
		<!-- Inserção de atributos -->
		<table align="center" width="300px">
			<tr>
				<td>
					<input type="text" class="form-control" id="entrada_atribute" name="atribute" placeholder="Atributo" style=" text-transform: lowercase;">
				</td>
				<td>
					<button id="add" onclick="return false;" class="btn btn-secondary">INSERIR</button>
				</td>
			</tr>
		</table>
		<!-- Fim Inserção de atributos -->
	<br>
	<!-- Área do atributos adicionados -->
	<textarea id="Atributos" name="atributos" class="form-control" style="width: 298px; height: 98px; margin: auto;" readonly></textarea> 
	<!-- FIM Área de atributos adicionados-->
	<br>
	<!-- Opições -->
	<table align="center" width="300px">
		<tr>
			<td>
				<input type="submit" class="btn btn-secondary btn-block" value="GERAR CLASSE">
			</td>
			<td>
				<button id="limpar" onclick="return false;" class="btn btn-danger btn-block">LIMPAR</button>
			</td>
		</tr>
	</table>
	<!-- Fim Opições -->
	</form>
</div>
<br>
<script>
	$(document).ready(function() {
		var append = "";
		var cont = 0;
		$("#add").click(function(){ // evento adicionar atributos ao textarea
			var aux = $("#entrada_atribute").val();
			var atributo = $("#Atributos").val();
			if(cont > 0 && $.trim(aux) != "") // pula linha somente se não for a primeira iserção e inserção for diferente de vazio
			{
				append += "\n";
			}
			if($.trim(aux) != "")
			{
				append +=  $.trim(aux);
			}		
			$("#Atributos").val(append);    // insere novo atributo
			$("#entrada_atribute").val(""); // limpa campo de inserção
			cont += 1;
		});

		$("#limpar").click(function(){ // Limpando construtor de classes
			$("#Atributos").val("");
			$("#entrada_atribute").val("");
			$("#nome-class").val("");
			append = "";
			cont = 0;
		});
	});
</script>


