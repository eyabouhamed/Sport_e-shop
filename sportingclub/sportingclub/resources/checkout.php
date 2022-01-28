<?php require_once("config.php"); ?>


<?php

if (isset($_POST['delivery_type'])) {
    if (isset($_SESSION['user_id'])) {
        $client_id = $_SESSION['user_id'];
        $delivery_type = $_POST['delivery_type'] == "0" ? "Retrait magasin" : "Paiement à la livraison";
        
        if ($_SESSION['item_total'] >= 300) $delivery_fees = 0;
        else $delivery_fees = $delivery_type == "Retrait magasin" ? 0 : 7 ;
        
        $order_total = $_SESSION['item_total'] + $delivery_fees;

        $query = query("INSERT INTO orders(date, client_id, delivery_type, delivery_fees, total) VALUES (NOW(), '{$client_id}', '{$delivery_type}', '{$delivery_fees}', '{$order_total}')");
        confirm($query);

        $query1 = query("SELECT MAX(id) FROM orders WHERE client_id = '{$client_id}' ");
        confirm($query1);
        $row1 = fetch_array($query1);
        $order_id = $row1['MAX(id)'];

        foreach ($_SESSION as $name => $value) {

            if ($value > 0) {

                if (substr($name, 0, 8) == "product_") {

                    $length = strlen($name);

                    $id = substr($name, 8, $length);

                    $query = query("SELECT * FROM product WHERE id = " . escape_string($id) . " ");
                    confirm($query);

                    while ($row = fetch_array($query)) {

                        $new_price = $row['price'] * (100 - $row['promo']) / 100;
                        $sub = $new_price * $value;

                        $product_id = $row['id'];
                        $product_name = $row['label'];
                        $product_price = $new_price;
                        $product_quantity = $value;
                        $line_total = $sub;

                        /*
                    echo $row['id'];
                    echo " ";
                    echo $row['label'];
                    echo " ";
                    echo $new_price;
                    echo " ";
                    echo $value;
                    echo " ";
                    echo $sub;
                    echo " "; */

                        $query2 = query("INSERT INTO order_line(order_id, product_id, product_name, product_price, product_quantity, line_total) VALUES ('{$order_id}', '{$product_id}', '{$product_name}', '{$product_price}', '{$product_quantity}', '{$line_total}')");
                        confirm($query2);


                        //  $_SESSION['item_total'] = $total += $sub;
                        //$_SESSION['item_quantity'] = $item_quantity;
                    }
                }
            }
        }
        $user_first_name = $_SESSION['user_first_name'];
        $user_last_name = $_SESSION['user_last_name'];
        $user_email = $_SESSION['user_email'];
        $user_id = $_SESSION['user_id'];
        session_destroy();
        session_start();
        $_SESSION['user_first_name'] = $user_first_name;
        $_SESSION['user_last_name']  = $user_last_name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_id'] = $user_id;
        set_message("<div class='alert alert-success'>Votre commande est bien transmise. Nous vous répondrons dans les plus brefs délais. Bonne journée.</div>");
        redirect("../public/order.php?id=" . $order_id);
    } else {
        set_message("Identifiez-vous ou créer un compte d'abord.");
        redirect("../public/login.php");
    }
}
