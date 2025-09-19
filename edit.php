<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if ($_SESSION['logueado']) {

include_once("config_products.php");
include_once("db.class.php");
$link = new Db();
$idUpt= $_GET['q'];
$sql = "select p.id_product,c.category_name,p.product_name,p.price from products p inner join categories c on p.id_category=c.id_category where id_product=".$idUpt;
$stmt=$link->run($sql);
$data = $stmt->fetch();
}

?>
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
                <h3 class="text-center">ACTUALIZAR PRODUCTOS</h3>
    </div>
    <div class="col-md-12">
    <form class="form-group" accept-charset="utf-8" action="update_products.php" method="post">
    <div class="form-group"> 
        <input type="hidden" name="id" value="<?php echo $data['id_product'] ?>">
    </div>
    <div class="form-group">
        <label class="control-label">NOMBRE</label>
        <input id="nombre" name="nombre" class="form-control" type="text" value="<?php echo $data['product_name'] ?>">
    </div>
    <div class="form-group">
        <label class="control-label">Precio</label>
        <input id="nombre" name="nombre" class="form-control" type="text" value="<?php echo $data['price'] ?>">
    </div>
    <div class="form-group">
        <label class="control-label">Categoria</label>
        <input id="nombre" name="nombre" class="form-control" type="text" value="<?php echo $data['category_name'] ?>">
    </div>
    <div class="text-center">
          <br>
          <input type="submit" class="btn btn-success" value="Guardar Producto">
    </div>


</form>
    </div>
    </div>
</div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</html>
