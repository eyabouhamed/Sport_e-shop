<?php require_once("config.php"); ?>


<?php

if (isset($_GET['add'])) {
    $query = query("SELECT * FROM product WHERE id=" . escape_string($_GET['add']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) {


        if ($row['quantity'] != $_SESSION['product_' . $_GET['add']]) {

            $_SESSION['product_' . $_GET['add']] += 1;
            redirect("../public/my_cart.php");
        } else {
            set_message("Désolé! Encore " . $row['quantity'] . " <b>" . "{$row['label']}" . "</b> disponible(s) pour le moment.");
            redirect("../public/my_cart.php");
        }
    }
    // $_SESSION['product_' . $_GET['add']] +=1;

    // redirect("index.php");
}
if (isset($_GET['remove'])) {

    $_SESSION['product_' . $_GET['remove']]--;

    if ($_SESSION['product_' . $_GET['remove']] < 1) {

        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../public/my_cart.php");
    } else {

        redirect("../public/my_cart.php");
    }
}

if (isset($_GET['delete'])) {

    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);

    redirect("../public/my_cart.php");
}



function cart()
{

    //
    //    foreach ($_SESSION as $name => $value) {
    //
    //        echo "<pre>";
    //
    //       var_dump($_SESSION);
    //
    //        echo "</pre>";
    //
    //
    //    }

    $total = 0;
    $item_quantity = 0;
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;
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
                    $item_quantity += $value;

                    $product = "<tr class='table_row'>
<td class='column-1'>
    <a href='../resources/cart.php?delete={$row['id']}'>
        <div class='how-itemcart1'>
            <img src='{$row['photo']}' alt='IMG'>
        </div>
    </a>
</td>
<td class='column-2'><a style='color:grey;' href='product-detail.php?id={$row['id']}'>{$row['label']}</a></td>
<td class='column-3'>{$new_price}.000</td>
<td class='column-4'>
    <div class='wrap-num-product flex-w m-l-auto m-r-0'>
        <a href='../resources/cart.php?remove={$row['id']}'>
        <div class='btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m'>
            <i class='fs-16 zmdi zmdi-minus'></i>
        </div>
        </a>

        <input class='mtext-104 cl3 txt-center num-product' type='number' name='num-product1' value='{$value}'>

        <a href='../resources/cart.php?add={$row['id']}'>
        <div class='btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m'>
            <i class='fs-16 zmdi zmdi-plus'></i>
        </div>
        </a>
    </div>
</td>
<td class='column-5'>{$sub}.000</td>
</tr>

<input type='hidden' name='product_title[]' value='{$row['label']}'>
<input type='hidden' name='product_id[]' value='{$row['id']}'>
<input type='hidden' name='product_price[]' value='{$new_price}'>
<input type='hidden' name='product_quantity[]' value='$value'>
";

                    echo $product;

                    $item_name++;
                    $item_number++;
                    $amount++;
                    $quantity++;

                    $_SESSION['item_total'] = $total += $sub;
                    $_SESSION['item_quantity'] = $item_quantity;
                }
            }
        }
    }
}

//redirect('../public/index.php');