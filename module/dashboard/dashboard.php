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
    $lista_usuarios = $help->get_User_byId();
    $nombre = $lista_usuarios[0];$id = $lista_usuarios[1];$mail = $lista_usuarios[2];
    //echo $id;
    ?>
  <table>
  <thead>
    <tr  class="table-active">
      <th scope="col" class="col-xs-3" >ID</th>
      <th scope="col" class="col-xs-3">NOMBRE</th>
      <th scope="col" class="col-xs-3">EMAIL</th>
    </tr>
  </thead>
  <!-- <tbody>
  <tr id="">
	  <td scope="row">
			<?php echo $id;?>
	  </td>
      <td scope="row">
      <?php echo $nombre;?>
      </td>
      <td scope="row">
      <?php echo $mail;?>
      </td>
    </tr>
  </tbody> -->
  </table>
</section>
<!-- /.content -->