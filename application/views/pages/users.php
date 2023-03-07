<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"><?= $title ?></h1>
	</div>

	<div class="table-responsive">

        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
            </div>
                <form action="<?=base_url()?>users/searchUsers" method="post">
                    <input class="form-control form-control-dark" type="text" name="search_users" id="search_users" placeholder="Pesquisar Usuários" aria-label="Search" value="">
                </form>
            </div>
        </div>

		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Senha</th>
					<th>País</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user) : ?>
				<tr>
					<td><?= $user['id'] ?></td>
					<td><?= $user['name'] ?></td>
					<td><?= $user['email'] ?></td>
					<td><?= $user['password'] ?></td>
					<td><?= $user['country'] ?></td>
					<td>
						<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit<?= $user['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
						<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete<?= $user['id'] ?>"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>  

				<!-- Modal Delete -->
				<div class="modal" id="modalDelete<?= $user['id'] ?>">
					<div class="modal-dialog">
						<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Deletar</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
								<p>Tem certeza de que quer remover <b><?= $user['name']; ?></b>?</p>
						</div>
						
						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							<a href="<?=base_url()?>users/delete/<?=$user["id"]?>" class="btn btn-danger">Remover</a>
						</div>

						</div>
					</div>
				</div>
				<!-- Modal Delete -->

				<!-- Modal Edit -->
				<div class="modal" id="modalEdit<?= $user['id'] ?>">

					<div class="modal-dialog">
						<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Editar</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<form action="<?=base_url()?>users/update/<?=$user["id"]?>" method="post">
																		
								<div class="form-group col-md-12">
									<label for="inputName">Nome</label>
									<input type="text" class="form-control" id="inputName" name="name" value="<?= $user['name'] ?>" required>
								</div>
								<div class="form-group col-md-12">
									<label for="inputEmail4">Email</label>
									<input type="email" class="form-control" id="inputEmail4" name="email" value="<?= $user['email'] ?>" required>
								</div>
								
								<div class="form-row px-3">	
									<div class="form-group col-md-6">
										<label for="inputPassword4">Senha</label>
										<input type="password" class="form-control" id="inputPassword4" name="password" required>
									</div>
									<div class="form-group col-md-6">
										<label for="inputCity">País</label>
										<input type="text" class="form-control" id="inputCity" name="country" value="<?= $user['country'] ?>" required>
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
