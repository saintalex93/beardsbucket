<?php include_once('superior.php');?>
<div class="content">
	




	<div class="header">
		<h4 class="title text-center">Cliente e Fornecedores</h4>
	</div>

	<div class="text-center botoes">
		<button type="submit" class="btn btn-info btn-fill btn-wd" id="formPF" onclick="fnHideFormCadastro(this.id)">PF</button>
		<button type="submit" class="btn btn-info btn-fill btn-wd" id="formPJ" onclick="fnHideFormCadastro(this.id)">PJ</button>

	</div>

	<div class="card col-md-12">

		<form id="formCadastroPF">
			<div id="pf">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nome</label>
							<input type="text" class="form-control border-input">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>CPF</label>
							<input type="text" class="form-control border-input" placeholder="Username" value="07.888.190/0001-09">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="exampleInputEmail1">Sexo</label>
							<select value="Teste" class="form-control border-input">

								<option name="" id="">Selecione...</option>

								<option name="" id="">Masculino</option>
								<option name="" id="">Feminino</option>
								<option name="" id="">Outros</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Telefone</label>
							<input type="text" class="form-control border-input" placeholder="Home Address" >
						</div>
					</div>

					<div class="row">
						
						<input type="radio"> Dados Completos?

					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Celular</label>
							<input type="text" class="form-control border-input"  >
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control border-input" placeholder="Home Address" >
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>CEP</label>
							<input type="text" class="form-control border-input" name="pfCPF" onkeyup ="if(this.value.length >= 8) fnCepPF(this.value)" >
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Logradouro</label>
							<input type="text" class="form-control border-input" name="pfLogradouro" >
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Número</label>
							<input type="text" class="form-control border-input" name="pfNumero" >
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Bairro</label>
							<input type="text" class="form-control border-input" name="pfBairro" >
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Cidade</label>
							<input type="text" class="form-control border-input" name="pfCidade" >
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Estado</label>
							<input type="text" class="form-control border-input" name="pfEstado" >
						</div>
					</div>

				</div>

			</div>

		</form>

		<form id="formCadastroPJ">
			<div id="pf">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Razão Social</label>
							<input type="text" class="form-control border-input">
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<label>Nome Fantasia</label>
							<input type="text" class="form-control border-input">
						</div>
					</div>

				</div>

				<div class="row">


					<div class="col-md-3">
						<div class="form-group">
							<label>CNPJ</label>
							<input type="text" class="form-control border-input" placeholder="Username" value="07.888.190/0001-09">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Telefone</label>
							<input type="text" class="form-control border-input">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control border-input" placeholder="Home Address" >
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Nome Representante</label>
							<input type="text" class="form-control border-input" placeholder="Home Address" >
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Telefone Representante</label>
							<input type="text" class="form-control border-input"  >
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control border-input" placeholder="Home Address" >
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>CEP</label>
							<input type="text" class="form-control border-input" name="pjCep" onkeyup ="if(this.value.length >= 8) fnCepPJ(this.value)" >
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Logradouro</label>
							<input type="text" class="form-control border-input" name="pjLogradouro" >
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Número</label>
							<input type="text" class="form-control border-input" name="pjNumero" >
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Bairro</label>
							<input type="text" class="form-control border-input" name="pjBairro" >
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Cidade</label>
							<input type="text" class="form-control border-input"  name="pjCidade">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Estado</label>
							<input type="text" class="form-control border-input" name="pjEstado" >
						</div>
					</div>

				</div>

			</div>

		</form>




	</div> <!-- CARD CADASTRO PF PJ -->










</div> <!-- CONTENT -->





<?php include_once('inferior.php');?>

<script src = "js/cadastro.js"></script>
<script src = "js/ajaxEndereco.js"></script>
