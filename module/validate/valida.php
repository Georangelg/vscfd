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
				width:600px;
                height: 600px;
				padding:10px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:0px;
			}
		</style>
</head>
<body>
<div class="container box">
    <form action="" method="post"><br><br><br>
    <div class="form-group has-feedback">
        <label for="">RFC EMISOR</label>
        <input type="text" name="remisor" id="remisor"  class="form-control">
        <br>
    </div>    
    <div class="form-group has-feedback">
        <label for="">RFC RECEPTOR</label>
        <input type="text" name="rreceptor" id="rreceptor"  class="form-control">
        <br>
    </div>               
    <div class="form-group has-feedback">
        <label for="">VALOR</label>
        <input type="text" name="valor" id="valor"  class="form-control">
        <br> 
    </div> 
    <div class="form-group has-feedback">
        <label for="">FOLIO FISCAL</label>
        <input type="text" name="uuid" id="uuid"  class="form-control">
        <br> 
    </div>
    <button type="button" class="btn btn-info" id="val_button">VALIDAR FACTURA</button>          
    </form>
        </div>
</body>
</html>