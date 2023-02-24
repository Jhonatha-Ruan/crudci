<!-- Dashboard -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Boletim de Diretorias</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="<?= base_url() ?>dashboard/new" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Novo boletim</a>
			</div>
		</div>       
	</div>

	<div class="table-responsive">

        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
            </div>
                <form action="<?=base_url()?>dashboard/searchDiretoria" method="post">
                    <input class="form-control form-control-dark" type="text" name="busca_diretoria" id="busca_diretoria" placeholder="Pesquisar Diretorias" aria-label="Search" value="">
                </form>
            </div>
        </div>

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
				<?php foreach($boletim_diretoria as $b) : ?>
          <tr>
            <td><?= $b['id'] ?></td>
            <td><?= $b['titulo'] ?></td>
			<td><?= $b['texto'] ?></td>
			<td><?= $b['tipo_aviso'] ?></td>
			<td><?= $b['nivel_permissao'] ?></td>
			<td>
				<a href="<?=base_url()?>dashboard/edit/<?=$b["id"]?>" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
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


        <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</main>
<!-- Dashboard -->