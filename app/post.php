<?php
function validar($nome, $atributos) # Validação do formulário
{
	if($nome == ""){ # Se o campo nome estiver vazio
	?>
		<script>
			MessageBox("Defina o nome da Classe!" , "make");
		</script>
	<?php
		return false;
	}

	if($atributos == ""){ # Se não tiver nenhum atributo para a criação da classe
	?>
		<script>
			MessageBox("Crie ao menos um atributo!" , "make");
		</script>
	<?php
		return false;
	}

	return true;
}


function colorText($str) # Mudar a cor do texto com tema (sublime text)
{
	$aux = str_replace("Class", "<font color='#58D3F7'>Class</font>", $str);
	$aux = str_replace("public", "<font color='#FE2E64'>public</font>", $aux);
	$aux = str_replace("private", "<font color='#FE2E64'>private</font>", $aux);
	$aux = str_replace(chr(36)."this->", "<font color='#FE9A2E'>".chr(36)."this-></font>", $aux);
	$aux = str_replace("function", "<font color='#58D3F7'>function</font>", $aux);
	$aux = str_replace("__construct", "<font color='#58D3F7'>__construct</font>", $aux);
	return $aux;
}

if(isset($_POST["nomeclass"]))
{
	if(validar($_POST["nomeclass"], $_POST["atributos"]))
	{
		$handle = explode("\n", $_POST["atributos"]);

		$aux = "\n"; # Criação da classe

		$aux .= "Class " . trim($_POST["nomeclass"]) . "\n{\n";

		# declarando atributos da classe
		foreach ($handle as $key => $value) {
			$aux .= "\tprivate $" . trim($value) . ";\n";
		}
		$aux .= "\n";

		// Criando o metodo contrutor

		if(isset($_POST["construtor"])) # criando método contrutor da classe
		{
			$aux .= "\tpublic function __construct(";

			foreach ($handle as $key => $value) { # Criando parâmetros do método construtor
				$aux .= "$" . trim($value);

				if($key == (count($handle) - 1))
				{
					break; # para o loop
				}
				else
				{
					$aux .= ", "; # Separando os parâmetros por virgula!
				}
			}

			$aux .= "){\n";

			# Criando a lógica do método construtor
			foreach ($handle as $key => $value) {
				$aux .= "\t\t$" . "this->" . trim($value) . " = $" . trim($value) .";\n";
			}
			$aux .= "\t}\n\n";
		} 

		//criando os gets

		if(isset($_POST["gets"])) # se existir métodos gets faça:
		{
			foreach ($handle as $key => $value) { # Criando métodos gets

				$get = trim($value);

				$s = substr($get, 0, 1);
				$s = strtoupper($s);


				$aux .= "\tpublic function get" . $s . substr($get, 1, (strlen($get))) . "(){\n";
			
				$aux .= "\t\treturn $" . "this->" . $get . ";";
				$aux .= "\n\t}\n"; 
			}	
		}

		//criando os sets 

		if(isset($_POST["sets"])) # Se existir métodos sets faça:
		{
			foreach ($handle as $key => $value) { # Criando métodos sets

				$set = trim($value);

				$s = substr($set, 0, 1);
				$s = strtoupper($s);


				$aux .= "\tpublic function set" . $s . substr($set, 1, (strlen($set))) . "($". $set ."){\n";
			
				$aux .= "\t\t$" . "this->" . trim($value) . " = $" . trim($value) .";\n";
				$aux .= "\t}\n"; 
			}	
		}
		$aux .= "}\n";
	?>
	<br>
	<!-- Opições -->
	<button id="copy" class="btn btn-secondary" style="margin-left: 20px;" onclick="changeValue(); copy('class_text');">
		Copiar texto
	</button>
	<button class="btn btn-info" onclick="window.location.href='index.php?action=make';">
		Criar nova classe
	</button>
	<!-- Fim Opições -->

	<!-- Resultado-->
	<div class="row" style="text-align: center; margin: 20px;">
		<div id="class_text" class="col" style="text-align: left; background-color: #1C1C1C; height: 450px; overflow: scroll; color: #FFFFFF; font-size: 1.5vw; overflow-x: hidden; color: #FFFFFF;">
			<?php 
			echo "<font color='#BDBDBD'># MAKECLASS 1.1</font>";
			echo "<font color='#BDBDBD'><br># Autor: @diotech</font>";
			echo "<font color='#BDBDBD'><br># ".Date("d/m/Y")."</font><br>";
			echo "<pre>";
			$texto = colorText($aux);
			echo "<font color='#FFFFFF'>" . utf8_encode($texto) . "</font>"; 
			echo "</pre>"
			?>
		</div>
	</div>
	<!-- Fim Resultado -->
	<?php
	} # FIM IF
} # FIM IF
?>


<script type="text/javascript">

		function copy(element_id){ // copia texte de um elemento HTML
		  var aux = document.createElement("class_text");
		  aux.setAttribute("contentEditable", true);
		  aux.innerHTML = document.getElementById(element_id).innerHTML;
		  aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)"); 
		  document.body.appendChild(aux);
		  aux.focus();
		  document.execCommand("copy");
		  document.body.removeChild(aux);
		}

		function changeValue() // Muda o texto apresentado no botão
	    {
	        // Changes the text on the button
	        $("#copy").text(" Texto copiado...");
	    }
</script>



