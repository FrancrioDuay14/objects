<?php
    require_once "Medicine.php";
    require_once "Product.php";

    class Cart extends Medicine{
        private $cartItems = array();

        function addToCart($item){
            $this->cartItems[]= $item;
        }

        function viewCart(){
            $arrCartItems = $this->cartItems;
            foreach ($arrCartItems as $key => $item) {
                echo
                    '
                        <ul>
                            <li><b>Name: </b> '. $item->getName() .'</li>
                            <li><b>Description: </b> '. $item->getDescription() .'</li>
                            <li><b>Price: </b>₱ '. $item->getPrice().'</li>
                            <li><b>Dose: </b> '. $item->getDose() .'</li>
                            <li><b>Type: </b> '. $item->getType() .'</li>
                            <li><b>Exp Date: </b> '. $item->getExpirationDate() .'</li>
                            <li><b>SRP: </b>₱ '. number_format($item->computeSRP(), 2 ) .'<hr></li>
                        </ul>
                    
                    ';
            }
        }
            function computeTotal(){
                $total = 0;

                foreach ($this->cartItems as $key => $item) {
                    $total += $item->computeSRP();
                }

                echo '<b>Total Cart Amount: </b> ₱' . number_format($total, 2 );
             }

        

    }

?>