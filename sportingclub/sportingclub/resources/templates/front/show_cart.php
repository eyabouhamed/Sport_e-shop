<div class="row">
    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
        <div class="m-l-25 m-r--38 m-lr-0-xl">
            <div class="wrap-table-shopping-cart">
                <table class="table-shopping-cart">
                    <tr class="table_head">
                        <th class="column-1">Produit</th>
                        <th class="column-2"></th>
                        <th class="column-3">Prix</th>
                        <th class="column-4" style="text-align: center;">Quantité</th>
                        <th class="column-5">Total</th>
                    </tr>

                    <?php cart(); ?>

                </table>
            </div>

        </div>
    </div>

    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
            <h4 class="mtext-109 cl2 p-b-30">
                Détails de commande
            </h4>

            <br>
            <div class="flex-w flex-t bor12 p-b-13">
                <div class="size-208">
                    <span class="stext-110 cl2">
                        Sous-total:
                    </span>
                </div>

                <div class="size-209">
                    <span class="mtext-110 cl2">
                        <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>.000 TND
                    </span>
                </div>
            </div>

            <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                <div class="size-208 w-full-ssm">
                    <span class="stext-110 cl2">
                        Frais livraison:
                    </span>
                </div>

                <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                    <span class="mtext-110 cl2">
                        <?php echo $_SESSION['item_total'] >= 300 ? "GRATUIT" : "7.000 TND";
                        $delivery = 7;
                        if ($_SESSION['item_total'] >= 300) $delivery = 0;
                        ?>
                    </span>

                    <div class="p-t-15">
                        <span class="stext-112 cl8">
                            méthode de paiement
                        </span>

                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                            <select class="js-select2" name="time">
                                <option disabled selected>Choisir une option</option>
                                <option>Retrait magasin</option>
                                <option>Paiement à la livraison</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="flex-w flex-t p-t-27 p-b-33">
                <div class="size-208">
                    <span class="mtext-101 cl2">
                        Total:
                    </span>
                </div>

                <div class="size-209 p-t-1">
                    <span class="mtext-110 cl2">
                        <?php echo isset($_SESSION['item_total']) ? ($_SESSION['item_total'] + $delivery) : $_SESSION['item_total'] = "0"; ?>.000 TND
                    </span>
                </div>
            </div>

            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                Commander
            </button>
        </div>
    </div>
</div>