<?php
if (isset($_POST['commande'])){
	 $idcom = new mysqli("localhost","root","","Sportingclub");
	 mysqli_set_charset($idcom, "utf8");
     $stmt = $idcom->prepare("UPDATE orders set status='Confirmé' WHERE id=?");
        $stmt->bind_param("i", $_POST['commande']);
        $stmt->execute();
        $stmt1 =$idcom->prepare('SELECT product_id,product_quantity  FROM order_line  where order_id = '.$_POST['commande'].'  ; ');
        if(!$stmt1){
       echo "Prepare failed: (". $idcom->errno.") ".$idcom->error."<br>";
    }
        $stmt1->execute();
        $stmt1->bind_result($id,$quantity);
        while($stmt1->fetch()){
        		//echo $id.$quantity ;
        	    $idcom1 = new mysqli("localhost","root","","Sportingclub");
        	    $req = 'UPDATE product set quantity=quantity-"'.$quantity.'" WHERE id="'.$id.'"';
				$idcom1->query($req);
				$idcom1->close() ;

        }



        $idcom->close() ;
         }
        header('Location: ConsulterCommandes.php'); ?>
