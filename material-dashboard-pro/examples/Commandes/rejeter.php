<?php
if (isset($_POST['commande'])){
	 $idcom = new mysqli("localhost","root","","Sportingclub");
	 mysqli_set_charset($idcom, "utf8");
     $stmt = $idcom->prepare("UPDATE orders set status='Annulé' WHERE id=?");
        $stmt->bind_param("i", $_POST['commande']);
        $stmt->execute();
        $idcom->close() ;
         }
        header('Location: ConsulterCommandes.php'); ?>
