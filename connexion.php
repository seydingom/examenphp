<?php
$link = mysqli_connect("localhost","root","");

if($link===false){
(    die("ERREUR:Impossible de se connecter.".mysqli_connect_error());

}
echo"Connexion réussie.Information sur l'hote:". mysqli_get_host_info($link);



?>