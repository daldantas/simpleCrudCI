<div class="container">
<div>
	<h1>Lista de Usuários:</h1>
</div>
<div class="pull-right">
	<a href="<?php echo site_url('users/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Nome</th>
		<th>Email</th>
		<th>Cpf</th>
		<th>Actions</th>
    </tr>
	<?php foreach($users as $u){ ?>
    <tr>
		<td><?php echo $u['id']; ?></td>
		<td><?php echo $u['nome']; ?></td>
		<td><?php echo $u['email']; ?></td>
		<td><?php echo $u['cpf']; ?></td>
		<td>
            <a href="<?php echo site_url('users/edit/'.$u['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('users/remove/'.$u['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
</div>	
