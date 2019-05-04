<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
</head>
<body>
<div class="container box">
			<h1 align="center">AQUI VA EL CRUD</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg" onclick="data()">Add</button>
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">ID</th>
							<th width="20%">USUARIO</th>
                            <th width="20%">MAIL</th>
                            <th width="20%">PASS</th>
							<th width="10%">Editar</th>
							<th width="10%">Delete</th> 
						</tr>
					</thead>
				</table>

			</div>
		</div>
</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Adicionar Usuario</h4>
				</div>
				<div class="modal-body">
					<label>Nombre</label>
					<input type="text" name="usuario" id="usuario" class="form-control" />
					<br />
					<label>Mail</label>
					<input type="text" name="mail" id="mail" class="form-control" />
					<br />
					<label>Password</label>
					<input type="password" name="pass" id="pass" class="form-control" />
					<br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
					<input type="hidden" name="operacao" id="operacao" />
					<input type="submit" name="action" id="action" mailclass="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div></div>