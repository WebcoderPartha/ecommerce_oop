<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php
                $iphone = $product->getIphone();
                if ($iphone){
                while ($result = $iphone->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?id=<?php echo $result['id']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Iphone</h2>
                    <p><?php echo $result['product_name'] ?></p>
                    <div class="button"><span><a href="details.php?id=<?php echo $result['id'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php  } } ?>
            <?php
                $iphone = $product->getSumsung();
                if ($iphone){
                while ($result = $iphone->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?id=<?php echo $result['id']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Samsung</h2>
                    <p><?php echo $result['product_name'] ?></p>
                    <div class="button"><span><a href="details.php?id=<?php echo $result['id'] ?>">Add to cart</a></span></div>
                </div>
            </div>
                <?php  } } ?>
        </div>
        <div class="section group">
            <?php
                $iphone = $product->getAcer();
                if ($iphone){
                while ($result = $iphone->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?id=<?php echo $result['id']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Acer</h2>
                    <p><?php echo $result['product_name'] ?></p>
                    <div class="button"><span><a href="details.php?id=<?php echo $result['id'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php  } } ?>
            <?php
                $iphone = $product->getCanon();
                if ($iphone){
                    while ($result = $iphone->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php?id=<?php echo $result['id']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Canon</h2>
                    <p><?php echo $result['product_name'] ?></p>
                    <div class="button"><span><a href="details.php?id=<?php echo $result['id'] ?>">Add to cart</a></span></div>
                </div>
            </div>
            <?php  } } ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="images/1.jpg" alt=""/></li>
                    <li><img src="images/2.jpg" alt=""/></li>
                    <li><img src="images/3.jpg" alt=""/></li>
                    <li><img src="images/4.jpg" alt=""/></li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>