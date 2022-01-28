<?php
if (isset($_POST['id'])){
	 $idcom = new mysqli("localhost","root","","Sportingclub");
	 mysqli_set_charset($idcom, "utf8");
     $stmt = $idcom->prepare("UPDATE orders set status='Livré' WHERE id=?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        $idcom->close() ;
         }
        header('Location: ConsulterCommandes.php'); ?>
