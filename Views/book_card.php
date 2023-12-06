<div class="col-12 col-md-4 col-lg-3 px-3 mb-5 movie-wrapper">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <div class="img-card-container">
                    <img src="<?php echo $image ?>" alt="<?php echo $title ?>">
                </div>
                <div class="price-tag">
                    <?php echo $price ?>
                </div>
            </div>
            <div class="flip-card-back">
                <div class="card-description py-4 text-center">
                    <h5 class="text-uppercase">
                        <?php echo $title ?>
                    </h5>
                    <div class="author mb-3">
                        <?php echo $authors ?>
                    </div>
                    <div class="mb-3">
                        <?php echo $categories ?>
                    </div>
                    <div class="mb-4">
                        <?php echo $price ?>
                    </div>
                    <p class="plot">"
                        <?php echo $content?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>