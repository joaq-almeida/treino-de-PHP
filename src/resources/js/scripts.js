$(document).ready(function(){

	carregarDados();
	$('#btnAtualizarDados').hide();
	$('#btnCancelar').hide();
});

$('#btnCancelar').on('click', function(){

	$('#campoNome').val('');
    $('#campoEmail').val('');
    $('#campoTelefone').val('');
    $('#campoCidade').val('');
    $('#campoEstado').val('');
    $('#campoNascimento').val('');

	$(this).hide();
	$('#btnAtualizarDados').hide();
	$('#btnCadastrar').show();	
});

$('#btnAtualizarDados').click(function(){

	var id = $('#idDado').val();
	var nome = $('#campoNome').val();
    var email = $('#campoEmail').val();
    var telefone = $('#campoTelefone').val();
    var cidade = $('#campoCidade').val();
    var estado = $('#campoEstado').val();
    var dataNasc = $('#campoNascimento').val();
    console.log(id, nome, email, telefone, cidade, estado, dataNasc);
	atualizarDados(id, nome, email, telefone, cidade, estado, dataNasc);
	$(this).hide();
	$('#btnCadastrar').show();
});

$(document).on('click', '#btnAtualizar', function(){

	$('#btnCadastrar').hide();

	var id = $(this).val();
	var nome = $('.nomeData').text();
    var email = $('.emailData').text();
    var telefone = $('.telefoneData').text();
    var cidade = $('.cidadeData').text();
    var estado = $('.estadoData').text();
    var dataNasc = $('.data_nascimentoData').text();
    
	passarDados(id, nome, email, telefone, cidade, estado, dataNasc);

	$('#btnAtualizarDados').show();
	$('#btnCancelar').show();
});

$(document).on('click', '#btnDeletar', function(){

	var id = $(this).val();
	alert(id);
	deletarDados(id);
});


$('#btnCadastrar').click(function(e){

	e.preventDefault();

	var nome = $('#campoNome').val();
    var email = $('#campoEmail').val();
    var telefone = $('#campoTelefone').val();
    var cidade = $('#campoCidade').val();
    var estado = $('#campoEstado').val();
    var dataNasc = $('#campoNascimento').val();

	salvarDados(nome, email, telefone, cidade, estado, dataNasc);
});

var passarDados = function(id,nome, email, telefone, cidade, estado, dataNasc){

	$('#idDado').val(id);
	$('#campoNome').val(nome);
    $('#campoEmail').val(email);
    $('#campoTelefone').val(telefone);
    $('#campoCidade').val(cidade);
    $('#campoEstado').val(estado);
    $('#campoNascimento').val(dataNasc);
}

var salvarDados = function(nome, email, telefone, cidade, estado, dataNasc){

	$.ajax({
		type: 'post',
		url: 'src/controller/PessoaController.php',
		data: {
            'cadastrar' : 1,
            'nome': nome,
            'email': email,
            'telefone': telefone,
            'cidade': cidade,
            'estado': estado,
            'data_nascimento': dataNasc
        },
		success: function(res){
            alert("Inserido com sucesso!!!");
            location.reload();
			console.log(res);
		},
		error: function(res){
			console.log(res);
		}
	});
}

var carregarDados = function(){

	$.ajax({
		url: 'src/controller/PessoaController.php',
		success: function(res){
			console.log(res);
			tabelaDados(res);	
		},
		error: function(res){
			console.log(res);
		}
	});	
}

var tabelaDados = function(val){

	var output = '';
	$.each(JSON.parse(val), function(index, dados){
		output += 
		`<tr>
			<td>${dados.id}</td>
			<td value="nome" class="nomeData">${dados.nome}</td>
            <td value="email" class="emailData">${dados.email}</td>
            <td value="telefone" class="telefoneData">${dados.telefone}</td>
            <td value="cidade" class="cidadeData">${dados.cidade}</td>
            <td value="estado" class="estadoData">${dados.estado}</td>
            <td value="data_nascimento" class="data_nascimentoData">${dados.data_nascimento}</td>
			<td><button value="${dados.id}" id="btnAtualizar" class="btn" name="atualizar">Editar</button></td>
			<td><button value="${dados.id}" id="btnDeletar" class="btn" name="deletar">Deletar</button></td>
		</tr>		   
		`;
	});
	$('tbody').append(output);
}

var deletarDados = function(val){

	$.ajax({
		type: 'get',
		url: 'src/controller/PessoaController.php',
		data: {'deletar': 1, 'codigo': val},
		success: function(res){
            console.log(res);
            location.reload();
		},
		error: function(res){
			console.log(res+" DEU RUIM!");
		}
	});
}

var atualizarDados = function(id, nome, email, telefone, cidade, estado, dataNasc){
	
	$.ajax({
		type: 'post',
		url: 'src/controller/PessoaController.php',
		data: {
            'atualizar' : 1,
            'codigo': id,
            'nome': nome,
            'email': email,
            'telefone': telefone,
            'cidade': cidade,
            'estado': estado,
            'data_nascimento': dataNasc
        },
		success: function(res){
            alert("Atualizado com sucesso!!!");
            location.reload();
			console.log(res);
		},
		error: function(res){
			console.log(res);
		}
	});	
}