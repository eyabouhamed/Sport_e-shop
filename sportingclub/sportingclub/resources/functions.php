<?php

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location)
{
    return header("Location: $location");
}

function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}


function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}



function fetch_array($result)
{
    return mysqli_fetch_array($result);
}


/****************************FRONT END FUNCTIONS************************/

function show_slider()
{
    $query = query("SELECT * FROM slider WHERE slider_set = '1'");
    confirm($query);

    while ($row = fetch_array($query)) {

        $slider = "<div class='item-slick1' style='background-image: url({$row['slider_img']});'>
        <div class='container h-full'>
            <div class='flex-col-l-m h-full p-t-100 p-b-30 respon5'>
                <div class='layer-slick1 animated visible-false' data-appear='fadeInDown' data-delay='0'>
                    <span class='ltext-101 cl2 respon2'>";
        echo $slider;
        $query2 = query("SELECT * FROM product WHERE reference = '{$row['product_ref']}'");
        confirm($query2);
        $row2 = fetch_array($query2);
        $slider = "{$row2['label']}</span>
                </div>
    
                <div class='layer-slick1 animated visible-false' data-appear='fadeInDown' data-delay='1000'>
                    <h2 class='ltext-201 cl2 p-t-19 p-b-43 respon1'>
                        NOUVELLE <br> COLLECTION
                    </h2>
                </div>
    
                <div class='layer-slick1 animated visible-false' data-appear='fadeInDown' data-delay='1600'>
                    <a href='product-detail.php?id={$row2['id']}' class='flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04'>
                        découvrir
                    </a>
                </div>
            </div>
        </div>
    </div>";
        echo $slider;
    }
}


function show_banner()
{
    $query = query("SELECT * FROM category WHERE banner = '1'");
    confirm($query);
    while ($row = fetch_array($query)) {
        $banner = "<div class='col-md-6 col-xl-4 p-b-30 m-lr-auto'>
        <div class='block1 wrap-pic-w'>
            <img src='{$row['photo']}' alt='IMG-BANNER'>
    
            <a href='category.php?id={$row['id']}' class='block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3'>
                <div class='block1-txt-child1 flex-col-l'>
                    <span class='block1-name ltext-102 trans-04 p-b-8'>
                        {$row['label']}
                    </span>
    
                    <span class='block1-info stext-102 trans-04'>
                        Tous les produits
                    </span>
                </div>
    
                <div class='block1-txt-child2 p-b-4 trans-05'>
                    <div class='block1-link stext-101 cl0 trans-09'>
                        Découvrir
                    </div>
                </div>
            </a>
        </div>
    </div>";
        echo $banner;
    }
}


function login()
{
    if (isset($_POST['submit'])) {
        $email = escape_string($_POST['email']);
        $passwd = escape_string($_POST['passwd']);

        $query = query("SELECT * FROM client WHERE email = '{$email}' AND passwd = '{$passwd}' ");
        confirm($query);

        if (mysqli_num_rows($query) == 0) {
            set_message("Votre email ou mot de passe est incorrecte.");
            redirect("login.php");
        } else {
            $_SESSION['user_email'] = $email;
            set_message("Bienvenu {$email}");
            redirect("my_account.php");
            $row = fetch_array($query);
            $_SESSION['user_first_name'] = $row['firstname'];
            $_SESSION['user_last_name'] = $row['lastname'];
            $_SESSION['user_id'] = $row['id'];
        }
    }
}

function logout()
{
    if (isset($_POST['submit'])) {
        session_destroy();
        session_start();
        $_SESSION['user_first_name'] = null;
        $_SESSION['user_last_name']  = null;
        $_SESSION['user_email'] = null;
        redirect("../public");
    }
}

function register()
{
    if (isset($_POST['submit'])) {
        $title = escape_string($_POST['title']);
        $firstname = escape_string($_POST['firstname']);
        $lastname = escape_string($_POST['lastname']);
        $cin = escape_string($_POST['cin']);
        $company = escape_string($_POST['company']);
        $address1 = escape_string($_POST['address1']);
        $address2 = escape_string($_POST['address2']);
        $zipcode = escape_string($_POST['zipcode']);
        $city = escape_string($_POST['city']);
        $country = escape_string($_POST['country']);
        $phone = escape_string($_POST['phone']);
        $email = escape_string($_POST['email']);
        $passwd = escape_string($_POST['passwd']);

        $query = query("INSERT INTO client(firstname, lastname, cin, email, passwd, phone, company, country, address1, address2, city, zipcode, title) VALUES ('{$firstname}', '{$lastname}', '{$cin}', '{$email}', '{$passwd}', '{$phone}', '{$company}', '{$country}', '{$address1}', '{$address2}', '{$city}', '{$zipcode}', '{$title}')");
        confirm($query);

        if ($query) {
            $query = query("SELECT * FROM client WHERE email = '{$email}' AND passwd = '{$passwd}' ");
            confirm($query);
            $_SESSION['user_email'] = $email;
            //set_message("Bienvenu {$email}");
            redirect("my_account.php");
            $row = fetch_array($query);
            $_SESSION['user_first_name'] = $row['firstname'];
            $_SESSION['user_last_name'] = $row['lastname'];
            $_SESSION['user_id'] = $row['id'];
        } else {
            set_message("Failed {$email}");
            redirect("register.php");
        }
    }
}


//ini_set("SMTP", "smtp.mailendo.com");
//ini_set("smpt_port", 25);

function send_message()
{

    if (isset($_POST['submit'])) {
        $to          = "ahmedsakka720@gmail.com";
        $from_name   =   escape_string($_POST['name']);
        $subject     =   escape_string($_POST['subject']);
        $email       =   escape_string($_POST['email']);
        $msg         =   escape_string($_POST['msg']);

        $headers = "From: {$from_name} {$email}";

        $result = mail($to, $subject, $msg, $headers);

        if (!$result) {
            set_message("Sorry we could not send your message");
            redirect("contact.php");
        } else {
            set_message("Your Message has been sent");
            redirect("contact.php");
        }
    }
}

function update_user_data()
{
    if (isset($_POST['update'])) {
        
        $company = escape_string($_POST['company']);
        $address1 = escape_string($_POST['address1']);
        $address2 = escape_string($_POST['address2']);
        $zipcode = escape_string($_POST['zipcode']);
        $city = escape_string($_POST['city']);
        $country = escape_string($_POST['country']);
        $phone = escape_string($_POST['phone']);

        $query = query("UPDATE client SET phone= '{$phone}', company= '{$company}', country='{$country}', address1='{$address1}', address2='{$address2}', city='{$city}', zipcode='{$zipcode}' WHERE email = '{$_SESSION['user_email']}'");
        confirm($query);
        echo "<div class='alert alert-success'>Vos informations ont étés modifiés avec succès !</div>";
        
    }
}