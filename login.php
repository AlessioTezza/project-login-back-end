

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>


<body>
  <?php
  include_once ("config_login.php");
  
  $usr = $_POST['username'];
  $pass = $_POST['password'];
  $hashed_pass=hash('sha256',$pass);
  
  try {
    $pdo = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
   } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  

  $sql="select * from users where (username=? or email=?) and password=?";
  
// Use de sentencias prepared
// Uso de POO- Programacion Orientada a Objeto   nombre_objeto->propiedad/metodo
$stmt=$pdo->prepare($sql);
  //def
  $stmt->execute([$usr,$usr,$hashed_pass]);
//def2
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if(!$row){
// No ingresa

echo "Los datos ingresados no son validos!";
}
  else{
//ingresa
 session_start();
 date_default_timezone_set('America/Argentina/Buenos_Aires');
 $_SESSION['time'] = date('H:i:s');
 $_SESSION['username'] = $usr;
 $_SESSION['logueado']=true;
 header("location:welcome.php");
}
  ?>
</body>
</html>
