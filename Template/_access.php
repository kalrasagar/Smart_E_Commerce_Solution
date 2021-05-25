<!-- Top Sale -->
<?php

    shuffle($accessories_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['accessories_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['Item_id']);
        }
    }
?>
<section id="top-sale" >
    <div class="container pt-5 pb-2" id="accessories">
        <h4 class="font-rubik font-size-20" >Mobile Accessories</h4>
        <hr class>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme" >
            <?php foreach ($accessories_shuffle as $item) { ?>
            <div class="item pb-4 pt-5 mx-1 px-3 border" >
                <div class="product font-rale">
                    <a href="<?php printf('%s?Item_id=%s', 'accessory.php',  $item['Item_id']); ?>"><img src="<?php echo $item['Item_image'] ?? "./assets/accessories/1.png"; ?>" alt="accessory1" class="img-fluid"></a>
                    <div class="text-center pt-3">
                        <h6><?php echo  $item['Item_name'] ?? "Unknown";  ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?php echo $item['Item_price'] ?? '0' ; ?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="Item_id" value="<?php echo $item['Item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <?php
                            if (in_array($item['Item_id'], $Cart->getCartId($accessories->getData('cart')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                            }else{
                                echo '<button type="submit" name="accessories_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                            }
                            ?>

                        </form>
                    </div>
                </div>
            </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale -->