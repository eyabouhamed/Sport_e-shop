<div class="menu-desktop">
    <ul class="main-menu">
        <?php 
        //New products
        echo "<li class='label1' data-label1='New'><a href='new_products.php'>NOUVEAUTÉS</a><ul class='sub-menu'>";
        $query1 = query("SELECT * FROM category");
            confirm($query1);
            while ($row1 = fetch_array($query1)) {
                echo "<li><a href='new_products.php?id={$row1['id']}'>{$row1['label']}</a></li>";
            }
        echo "</ul></li>";
    
        //Categories
        $query = query("SELECT * FROM category");
        confirm($query);
        while ($row = fetch_array($query)) {
            $categories_links = "<li><a href='category.php?id={$row['id']}'>{$row['label']}</a><ul class='sub-menu'>";
            echo $categories_links;
    
            $query1 = query("SELECT * FROM subcategory WHERE reference = '{$row['reference']}' ");
            confirm($query1);
            while ($row1 = fetch_array($query1)) {
                $subcategory_links = "<li><a href='category.php?id={$row['id']}&subid={$row1['id']}'>{$row1['label']}</a></li>";
                echo $subcategory_links;
            }
    
            $categories_links = "</ul></li>";
            echo $categories_links;
        }
        
        //Promotions
        echo "<li class='label1' data-label1='promo'><a href='discount.php'>PROMOTIONS</a><ul class='sub-menu'>";
        $query1 = query("SELECT * FROM category");
            confirm($query1);
            while ($row1 = fetch_array($query1)) {
                echo "<li><a href='discount.php?id={$row1['id']}'>{$row1['label']}</a></li>";
            }
        echo "</ul></li>";
        ?>
    </ul>
</div>