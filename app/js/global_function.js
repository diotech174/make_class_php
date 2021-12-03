	function Load() // função para para mostrar carregamendo do programa
{
	document.getElementById("load").style.display = "block";
	document.getElementById("animation").style.display = "block";
}

function MessageBox(msg, action) // função para mostrar um aviso na tela
{
	$(document).ready(function(){

		$("#border-msg").css("display", "block");
		$("#MessageBox").css("display", "block");
		$("#msg").text(msg);

		if(action != null)
		{
			$("#ButtonOK").click(function(){
				window.location.href="index.php?action=" + action;
			});
			$("#close").click(function(){
				window.location.href="index.php?action=" + action;
			});
		}
		else
		{
			$("#ButtonOK").click(function(){
				document.getElementById("border-msg").style.display = "none";
				document.getElementById("MessageBox").style.display = "none";
			});
			$("#close").click(function(){
				document.getElementById("border-msg").style.display = "none";
				document.getElementById("MessageBox").style.display = "none";
			});
		}	
	});
}

function DialogBox(msg, action, scrollE) // função para mostrar um diálogo na tela
{
	$(document).ready(function(){

		if(scrollE != 0)
		{
			window.scrollTo(0, 0);
			$('body').css('overflow', 'hidden');
		}

		document.getElementById("border-dialog").style.display = "block";
		document.getElementById("DialogBox").style.display = "block";
		$("#msg_dialog").text(msg);

		if(action != null)
		{
			$("#btnSim").click(function(){
				window.location.href="index.php?action=" + action;
			});
		}

		$("#btnNao").click(function(){
			document.getElementById("border-dialog").style.display = "none";
			document.getElementById("DialogBox").style.display = "none";
			if(scrollE != 0)
				$('body').css('overflow', 'scroll');
		});
		$("#CloseDialog").click(function(){
			document.getElementById("border-dialog").style.display = "none";
			document.getElementById("DialogBox").style.display = "none";
			if(scrollE != 0)
				$('body').css('overflow', 'scroll');
		});
	});
}

function ValidarForm(msg, obj, scrollE) // função para validar um formulário através de um diálogo
{
	$(document).ready(function(){

		if(scrollE != 0)
		{
			window.scrollTo(0, 0);
			$('body').css('overflow', 'hidden');
		}

		document.getElementById("border-dialog").style.display = "block";
		document.getElementById("DialogBox").style.display = "block";
		$("#msg_dialog").text(msg);

		$("#btnSim").click(function(){
			document.getElementById("border-dialog").style.display = "none";
			document.getElementById("DialogBox").style.display = "none";
			Load();
			document.getElementById(obj).submit();
		});

		$("#btnNao").click(function(){
			document.getElementById("border-dialog").style.display = "none";
			document.getElementById("DialogBox").style.display = "none";
			if(scrollE != 0)
				$('body').css('overflow', 'scroll');
		});

		$("#CloseDialog").click(function(){
			document.getElementById("border-dialog").style.display = "none";
			document.getElementById("DialogBox").style.display = "none";
			if(scrollE != 0)
				$('body').css('overflow', 'scroll');
		});
	});  
}

