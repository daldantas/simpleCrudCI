<div class="container">
	<div class="col-md-6">
		<h1>Adicionar usuário:</h1>
		<?php echo form_open('users/add',array("class"=>"form-horizontal")); ?>

			<div class="form-group">
				<label for="nome" class="col-md-1 control-label"><span class="text-danger">*</span>Nome</label>
				<div class="col-md-11">
					<input type="text" name="nome" value="<?php echo $this->input->post('nome'); ?>" class="form-control" id="nome" />
					<span class="text-danger"><?php echo form_error('nome');?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-md-1 control-label"><span class="text-danger">*</span>Email</label>
				<div class="col-md-11">
					<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
					<span class="text-danger"><?php echo form_error('email');?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="cpf" class="col-md-1 control-label"><span class="text-danger">*</span>Cpf</label>
				<div class="col-md-11">
					<input type="text" name="cpf" value="<?php echo $this->input->post('cpf'); ?>" class="form-control" id="cpf" />
					<span class="text-danger"><?php echo form_error('cpf');?></span>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-success pull-right">Save</button>
		        </div>
			</div>

		<?php echo form_close(); ?>
	</div>	
</div>