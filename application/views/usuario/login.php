<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <title>inMOBI ITLA - Login </title>
<link rel="icon" type="image/png" href="<?php echo base_url('img/favicon.png');?> ">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('img/favicon-32x32.png');?> ">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('img/favicon-96x96.png');?> ">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('img/favicon-16x16.png');?> ">

   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('css/reset.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/stylel.css'); ?>" media="screen" type="text/css" />
  <body>
    <div class="wrap">
      <div class="avatar">
      <a href="<?php echo base_url('welcome'); ?>"><img src="<?php echo base_url('img/iconL.png'); ?>"></a>
    </div>
      <form method="post" action="<?php echo base_url('seguridad/login'); ?>">
        <input type="text" name="email" placeholder="email" required>
        <div class="bar">
          <i></i>
        </div>
        <input type="password" name="clave" placeholder="contraseña" required>
        <br>
        <button type="summit">Entrar</button>
      </form>
      <div class=wrap>
        <div>
       	 <a href="<?php echo base_url('seguridad/singUp'); ?>"); " ><button>Registrarte</button></a>
        </div>
      </div>
    </div>
  <script src="<?php echo base_url('js/index.js') ?>"></script>
  </body>

</html>
