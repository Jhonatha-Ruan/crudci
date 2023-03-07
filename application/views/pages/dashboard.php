<!-- Dashboard -->
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		
		<h1 class="h2">Geral</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCadastro"><i class="fas fa-plus"></i> Novo boletim</a>
			</div>
		</div>		
	</div>
	
	
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h4">Últimos Boletins Adicionados</h2>
		
	</div>
	<?php if ($this->session->flashdata('block')) : ?>
		<div class="alert alert-danger">
			<?php echo $this->session->flashdata('block'); ?>
		</div>
	<?php endif; ?>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Título</th>
					<th>Texto</th>
					<th>Tipo de Aviso</th>
					<th>Nível de Permissão</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($boletim as $b) : ?>
          <tr>
            <td><?= $b['id'] ?></td>
            <td><?= $b['titulo'] ?></td>
			<td><?= $b['texto'] ?></td>
			<td><?= $b['tipo_aviso'] ?></td>
			<td><?= $b['nivel_permissao'] ?></td>
			<td>
				<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit<?= $b['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
				<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?= $b['id'] ?>"><i class="fas fa-trash-alt"></i></a>
			</td>
          </tr>  

			<!-- The Modal -->
			<div class="modal" id="myModal<?= $b['id'] ?>">
				<div class="modal-dialog">
					<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Deletar</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
							<p>Tem certeza de que quer remover <b><?= $b['titulo']; ?></b>?</p>
					</div>
					
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<a href="<?=base_url()?>dashboard/delete/<?=$b["id"]?>" class="btn btn-danger">Remover</a>
					</div>

					</div>
				</div>
			</div>

			<div class="modal" id="modalEdit<?= $b['id'] ?>">

				<div class="modal-dialog">
					<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Editar</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<form action="<?=base_url()?>dashboard/update/<?=$b["id"]?>" method="post">
																	
							<div class="form-group col-md-12">
								<label for="inputName">Título</label>
								<input type="text" class="form-control" id="titulo" name="titulo" value="<?= $b['titulo'] ?>" required>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="description">Texto</label>
									<textarea name="texto" id="texto" rows="5" class="form-control" required><?= $b["texto"] ?></textarea>
								</div>
							</div>
							
							<div class="form-row px-3">	
								<div class="col-md-6">
									<div class="form-group">
										<label for="tipo_aviso">Tipo do Aviso</label>
										<select class="form-control" id="tipo_aviso" name="tipo_aviso" required>
											<option>Urgente</option>
											<option>Noticias</option>
											<option>Atividades</option>
											<option>Duvidas</option>
										</select>  
									</div>                        
								</div>	
								<div class="col-md-6">
									<div class="form-group">
										<label for="nivel_permissao">Permissão</label>
										<select class="form-control" id="nivel_permissao" name="nivel_permissao" required>
											<option>Geral</option>
											<option>Funcionarios</option>
											<option>Diretoria</option>
										</select>    
									</div>                      
								</div>		
							</div>				
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
							</div>
						</form>
					</div>										
				</div>
			</div>


        <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</main>
<!-- Dashboard -->

<!-- Modal Cadastro Geral -->
<div class="modal" id="modalCadastro">
	<div class="modal-dialog">
		<div class="modal-content">
		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">Novo Boletim</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>

		<!-- Modal body -->
		<div class="modal-body">
			<form action="<?= base_url() ?>dashboard/novoBoletim" method="post">
														
				<div class="form-group col-md-12">
					<label for="inputName">Título</label>
					<input type="text" class="form-control" id="titulo" name="titulo" required>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="description">Texto</label>
						<textarea name="texto" id="texto" rows="5" class="form-control" required></textarea>
					</div>
				</div>
				
				<div class="form-row px-3">	
					<div class="col-md-6">
						<div class="form-group">
							<label for="tipo_aviso">Tipo do Aviso</label>
							<select class="form-control" id="tipo_aviso" name="tipo_aviso" required>
								<option>Urgente</option>
								<option>Noticias</option>
								<option>Atividades</option>
								<option>Duvidas</option>
							</select>  
						</div>                        
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="nivel_permissao">Permissão</label>
							<select class="form-control" id="nivel_permissao" name="nivel_permissao" required>
								<option selected>Geral</option>
								<option>Funcionarios</option>
								<option>Diretoria</option>
							</select>    
						</div>                      
					</div>		
				</div>				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
				</div>
			</form>
		</div>										
	</div>
</div>