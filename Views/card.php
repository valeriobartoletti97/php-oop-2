<div class="col-12 col-md-4 col-lg-3 px-3 mb-5 movie-wrapper">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <div class="img-card-container">
                    <img src="<?php echo $image ?>" alt="<?php echo $title ?>">
                </div>
                <div class="price-tag">
                    <?php if (isset($sale) && $sale){
                        echo ($price -($price * ($sale / 100))) . '€';
                    } else {
                        echo $price . '€';
                    }?>
                </div>
            </div>
            <div class="flip-card-back">
                <div class="card-description py-4 text-center">
                    <h5 class="text-uppercase">
                        <?php echo $title ?>
                    </h5>
                    <?php if (isset($vote)) echo $vote ?>
                    <div class="author mb-3">
                        <?php echo $content?>
                    </div>
                    <div class="mb-3">
                        <?php if (isset($categories)) echo $categories ?>
                    </div>
                    <?php
                    if(isset($error) && $error){?>
                        <div class="alert alert-danger">
                            <?php echo $error ?>
                        </div>
                    <?php } ?>
                    <div class="mb-3">
                        <?php echo $price ?>
                    </div>
                    <?php
                    if(isset($sale) && $sale){?>
                       <div class="text-center mb-4">
                        <span>Sconto <?php echo $sale?>%</span>
                       </div>
                    <?php } ?>
                    <p class="plot">
                        " <?php echo $overview?> "
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>