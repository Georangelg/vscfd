<?php
require "config/session.php";
require "config/helper.db2.php";
require "config/constant.php";
confirm_logged_in();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome to <?=PROJECT_MODULE?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="skin-black-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Welcome</b> <?=PROJECT_MODULE?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/yo.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['FIRST_NAME'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/yo.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['FIRST_NAME'] ?> - Web Developer
                  <small>Since 2011</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="?action=dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="?action=datatable">
            <i class="fa fa-list"></i> <span>Table</span>
          </a>
        </li>
        <li class="treeview">
          <a href="?action=validate">
          <i class="fa fa-tasks"></i> <span>Validacion</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-circle"></i> <span>Menu 1</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Sub Menu 1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Sub Menu 2</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php
$action = @$_GET['action'];
switch ($action) {
    case "":
    case "dashboard":
        include "module/dashboard/dashboard.php";
        break;
    case "datatable":
        include "module/table/table.php";
        break;
    case "validate":
        include "module/validate/valida.php";
        break;
    default:
        //echo "Invalid Action";//Pagina no encontrada 404 o algo asi
        include "module/error/404.php";
        break;
}

$data = new helper();

?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; Progesh.</strong> All rights
    reserved.
  </footer>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  //$.widget.bridge('uibutton', $.ui.button);
  var table;
  $(document).ready(function() {
    
    var url = document.location.toString().substring(58,42); //alert(url);
    
// Will only work if string in href matches with location
$('ul.sidebar-menu li li.treeview a[href="'+url+'"]').parent().addClass('active');

                    $('#add_button').click(function(){
	                              $('#user_form')[0].reset();
	                              $('.modal-title').text("Adicionar Usuário");
                                $('#pass').prop( "disabled", false );
	                              $('#action').val("Add");
	                              $('#operacao').val("Add");
	                              $('#user_uploaded_image').html('');
	});

  $('#val_button').click(function(){
	              //alert("Hola"); 
                var remisor = $('#remisor').val();//alert("El emisor es: "+remisor);              
                var rreceptor = $('#rreceptor').val();//alert("El receptor es: "+rreceptor);              
                var valor = $('#valor').val();
                var uuid = $('#uuid').val();
                $.ajax({
			                  url:"valida.php",
			                  method:"POST",
			                  data:{remisor:remisor, rreceptor:rreceptor, valor:valor, uuid:uuid},
                        success:function(data){
                          alert(data);
                        }

	});
});
    //alert("listo");
    table = $('#user_data').DataTable({

"processing": true, //Feature control the processing indicator.
"serverSide": true, //Feature control DataTables' server-side processing mode.

// Load data for the table's content from an Ajax source
"ajax": {
  "url": "list.php",
  "type": "POST"
},

//Set column definition initialisation properties.
"columnDefs": [
{
  "targets": [ -1 ], //last column
  "orderable": true, //set not orderable
},
],

});
$(document).on('click', '.delete', function(id){
		var id = $(this).attr("id");
		if(confirm("Tem certeza que deseja excluir esse Usuario ?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{id:id},
				success:function(data)
				{
					alert(data);
          //dataTable.ajax.reload();
          $('#user_data').DataTable().ajax.reload();
				}
			});
		}
		else
		{
			return false;
		}
	});



	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var usuario = $('#usuario').val();
		var mail = $('#mail').val();

		if(usuario != '' && mail != '')
		{
			$.ajax({
				url:"upadd.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
          $('#user_data').DataTable().ajax.reload();
				}
			});
		}
		else
		{
			alert("Nome e Sobre Nome, Obrigatórios");
		}
	});

	$(document).on('click', '.update', function(id){
		var id = $(this).attr("id");
    var nombre = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();//alert(nombre);
    var mail = $(this).parent("td").prev("td").prev("td").prev("td").text();//alert(mail);
    //var pass = $(this).parent("td").prev("td").prev("td").text();//alert(pass);
    var tipo = $(this).parent("td").prev("td").text();//alert(tipo);
    $.ajax({
			url:"upadd.php",
			method:"POST",
			data:{id:id, nombre:nombre, mail:mail, tipo:tipo},
      success:function(data)
			{
    
        
        //alert(nombre);
        $('#userModal').modal('show');
				$('#usuario').val(nombre);
				$('#mail').val(mail);
        $('#tipo').val(tipo);
        $('#pass').prop( "disabled", true );
				$('.modal-title').text("Edit User");
				$('#id').val(id);
				$('#action').val("Edit");
				$('#operacao').val("Edit");
        
			}
		})
	});
  });



</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


</body>
</html>
