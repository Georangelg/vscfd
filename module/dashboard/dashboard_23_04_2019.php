<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>150</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>Usuarios</h3>
          
     <!-- <p>Unique Visitors</p> -->
        </div>
        <div class="icon">
          <!-- <i class="ion ion-pie-graph"></i> -->
          
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    
<!-- ./col -->
  </div>
  
  <!-- /.row -->
  <?php
    //$lista_usuarios = $help->get_user_lilst_one();/*$nombre = $lista_usuarios[0];$id = $lista_usuarios[1];$mail = $lista_usuarios[2];*///$cookie = $help->validate_cookie();//$user = $lista_usuarios[0];//var_dump($user);//$qty = count($lista_usuarios);//$del = $help->del_user();
    $lista_usuarios = $help->lista_full();
    //var_dump($lista_usuarios);
    $someArray = json_decode($lista_usuarios, true);
    //print_r($someArray);
    
      ?>
<table>
  <thead>
    <tr  class="table-active">
      <th scope="col" class="col-xs-3" >NOMBRE</th>
      <th scope="col" class="col-xs-3">MAIL</th>
      <th scope="col" class="col-xs-3">PASSWORD</th>
      <th scope="col" colspan="2">ACCIONES</th>
    </tr>
  </thead>
  <?php
  foreach ($someArray as $value){
    $nombre = $value[0];$user = $value[1];$pass = $value[2];?>
   <tbody>
  <tr id="">
	  <td scope="row">
			<?php echo $nombre;?>
	  </td>
      <td scope="row">
      <?php echo $user;?>
      </td>
      <td scope="row">
      <?php echo $pass;?>
      </td>
      <td scope="row">
      1
      </td>
    </tr>
  </tbody>
  <?php } ?> 
  </table> 
</section>
<!-- /.content -->