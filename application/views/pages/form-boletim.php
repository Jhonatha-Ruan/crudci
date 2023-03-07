<main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastro de Boletim</h1>
      </div>

			<div class="col-md-12">
					<?php if(isset($boletim)) : ?>
						<form action="<?=base_url()?>dashboard/update/<?= $boletim["id"]?>" method="post">
					<?php else : ?>
						<form action="<?=base_url()?>dashboard/store" method="post">
					<?php endif; ?>
					
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Título</label>
							<input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título" required value="<?= isset($boletim) ? $boletim["titulo"] : "" ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="description">Texto</label>
							<textarea name="texto" id="texto" rows="5" class="form-control" required><?= isset($boletim) ? $boletim["texto"] : "" ?></textarea>
						</div>
					</div>
                    
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
					
					<div class="col-md-6">
							<a href="<?= base_url()?>dashboard" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
							<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
						</div>
					</div>
				</form>
			</div>

    </main>
  </div>
</div>
