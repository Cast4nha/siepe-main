<?php
include_once '../../controller/ControllerComunidade.php';
$controllerComunidade = new ControllerComunidade();
$comunidades = $controllerComunidade->ListAllComunidade();
?>
<div class="container">
	<div class="row">
		<br>
		<h5 class="header">Relatórios</h5>
		<br>
		<ul class="collapsible">
			<li>
				<div class="collapsible-header">Quilos de Pescado por Rio</div>
				<div class="collapsible-body">
					<form method="post" target="_blank"
						action="../relatorios/relatorioQuilosPescaRio.php">
						<div class='row'>
							<div class='col s1 m1 l1 xl1 input-field'>
								<input type='checkbox' id='byDataInicial' name='byDataInicial'
									disabled /> <label for='byDataInicial'></label>
							</div>
							<div class="col s11 m11 l3 xl3 input-field">
								<input id="data_inicial" type="date" name="data_inicial" /> <label
									class='active' for="data_inicial">Data Inicial:</label>
							</div>
							<div class='col s1 m1 l1 xl1 input-field'>
								<input type='checkbox' id='byDataFinal' name='byDataFinal'
									disabled /> <label for='byDataFinal'></label>
							</div>
							<div class="col s11 m11 l3 xl3 input-field">
								<input id="data_final" type="date" name="data_final" /> <label
									class='active' for="data_final">Data Final:</label>
							</div>
							<div class='col s1 m1 l1 xl1 input-field'>
								<input type='checkbox' id='byRio' name='byRio' disabled /> <label
									for='byRio'></label>
							</div>
							<div class="col s11 m11 l3 xl3 input-field">
								<input id="rio" type="text" name="rio" size="100"
									maxlength="100" /> <label for="rio">Rio:</label>
							</div>
						</div>
						<div class="row">
							<div class="center">
								<button class="btn waves-effect waves-light bt-default"
									type="submit" id="gerarQuantPesca" name="gerarQuantPesca">Gerar</button>
							</div>
						</div>
					</form>
				</div>
			</li>
			<li>
				<div class="collapsible-header">CPUE por comunidade</div>
				<div class="collapsible-body">
					<form method="post" target="_blank"
						action="../relatorios/relatorioCpueComunidade.php">
						<div class='row'>
							<div class='input-field col s12 m12'>
								<select name='comunidades[]' id=comunidades multiple>
									<option value='' disabled selected>Escolha uma ou mais opções</option>
									<?php foreach ($comunidades as $comunidade) { ?>
									<option value='<?php echo $comunidade->getId(); ?>'><?php echo $comunidade->getDescricao(); ?></option>
									<?php } ?>
								</select> <label for='comunidades'>Comunidades:</label>
							</div>
						</div>
						<div class="row">
							<div class="center">
								<button class="btn waves-effect waves-light bt-default"
									type="submit" id="gerarCpueComunidade" name="gerarCpueComunidade">Gerar</button>
							</div>
						</div>
					</form>
				</div>
			</li>
			<li>
				<div class="collapsible-header active">
					<i class="material-icons">chat</i>
					Assistente Virtual
				</div>
				<div class="collapsible-body">
					<div class="chat-container">
						<div id="chat-messages" class="chat-messages"></div>
						<div class="chat-input-container">
							<div class="input-field">
								<input type="text" id="message-input" class="materialize-textarea">
								<label for="message-input">Digite sua mensagem...</label>
							</div>
							<button class="btn waves-effect waves-light" id="send-message">
								<i class="material-icons right">send</i>Enviar
							</button>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>

<style>
.chat-container {
	display: flex;
	flex-direction: column;
	height: 400px;
}

.chat-messages {
	flex: 1;
	overflow-y: auto;
	padding: 10px;
	background: #f5f5f5;
	border-radius: 4px;
	margin-bottom: 10px;
}

.chat-input-container {
	display: flex;
	gap: 10px;
	align-items: flex-end;
}

.chat-input-container .input-field {
	flex: 1;
	margin: 0;
}

.message {
	margin-bottom: 10px;
	padding: 10px;
	border-radius: 4px;
	max-width: 80%;
}

.user-message {
	background-color: #2196F3;
	color: white;
	margin-left: auto;
}

.bot-message {
	background-color: #E3F2FD;
	margin-right: auto;
}

.typing-indicator {
	padding: 10px;
	background-color: #E3F2FD;
	border-radius: 4px;
	margin-bottom: 10px;
	display: none;
}

.typing-indicator span {
	display: inline-block;
	width: 8px;
	height: 8px;
	background-color: #90949c;
	border-radius: 50%;
	margin-right: 5px;
	animation: typing 1s infinite ease-in-out;
}

@keyframes typing {
	0%, 100% { transform: translateY(0); }
	50% { transform: translateY(-5px); }
}

.typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
.typing-indicator span:nth-child(3) { animation-delay: 0.4s; }
</style>

<script>
$(document).ready(function() {
    $('select').material_select();
});

function validaDataMinMax() {
 	var dataInicial = document.getElementById("data_inicial").value;
 	var dataFinal = document.getElementById("data_final").value;

 	if(dataFinal == "" && dataInicial != "") {
 		$('#data_final').attr('min', dataInicial);
 	}
 	if (dataInicial == "") {
 		$('#data_final').removeAttr('min');
 	}
 	if(dataInicial == "" && dataFinal != "") {
		$('#data_inicial').attr('max', dataFinal);
	}
	if (dataFinal == "") {
		$('#data_inicial').removeAttr('max');
	}
}

$('#data_inicial').on("change", function () {
	if (this.value!=null && this.value!='') $('#byDataInicial').attr('checked',true);
	else $('#byDataInicial').attr('checked',false);
});
$('#data_final').on("change", function () {
	if (this.value!=null && this.value!='') $('#byDataFinal').attr('checked',true);
	else $('#byDataFinal').attr('checked',false);
});
$('#data_inicial').on("blur", function() {
 	var di = new Date(this.value);
 	var df = new Date(document.getElementById('data_final').value);
 	if (di>df) {
 		this.value=document.getElementById('data_final').value;
 	}
 	validaDataMinMax();
 });

$('#data_final').on("blur", function() {
 	var di = new Date(document.getElementById('data_inicial').value);
 	var df = new Date(this.value);
 	if (df<di) {
 		this.value=document.getElementById('data_inicial').value;
 	}
 	validaDataMinMax();
});
$('#rio').on("change", function () {
	if (this.value!=null && this.value!='') $('#byRio').attr('checked',true);
	else $('#byRio').attr('checked',false);
});
function habilitaCheckbox() {
	$('input[type=checkbox]').attr('disabled',false);
}

document.addEventListener('DOMContentLoaded', function() {
	const chatMessages = document.getElementById('chat-messages');
	const messageInput = document.getElementById('message-input');
	const sendButton = document.getElementById('send-message');
	const typingIndicator = createTypingIndicator();

	function createTypingIndicator() {
		const div = document.createElement('div');
		div.className = 'typing-indicator';
		div.innerHTML = `
			<span></span>
			<span></span>
			<span></span>
		`;
		return div;
	}

	function addMessage(message, isUser = false) {
		const messageDiv = document.createElement('div');
		messageDiv.className = `message ${isUser ? 'user-message' : 'bot-message'}`;
		messageDiv.textContent = message;
		chatMessages.appendChild(messageDiv);
		chatMessages.scrollTop = chatMessages.scrollHeight;
	}

	function showTypingIndicator() {
		chatMessages.appendChild(typingIndicator);
		typingIndicator.style.display = 'block';
		chatMessages.scrollTop = chatMessages.scrollHeight;
	}

	function hideTypingIndicator() {
		typingIndicator.style.display = 'none';
	}

	async function sendMessage() {
		const message = messageInput.value.trim();
		if (!message) return;

		messageInput.value = '';
		addMessage(message, true);
		showTypingIndicator();

		try {
			const response = await fetch('http://localhost:3001/api/chat', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({ message })
			});

			const data = await response.json();
			hideTypingIndicator();
			addMessage(data.response);
		} catch (error) {
			hideTypingIndicator();
			addMessage('Desculpe, ocorreu um erro ao processar sua mensagem.', false);
			console.error('Erro:', error);
		}
	}

	sendButton.addEventListener('click', sendMessage);
	messageInput.addEventListener('keypress', function(e) {
		if (e.key === 'Enter') {
			e.preventDefault();
			sendMessage();
		}
	});

	// Mensagem inicial
	addMessage('Olá! Como posso ajudar você com os relatórios hoje?', false);
});
</script>