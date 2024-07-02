<div class="wrap-content mt-4 bg-white mb-4 p-4 pb-2 rounded-3">
    <div class="slick-slider">
        <?php
        $sliderList = $db->getRaw('SELECT * FROM images WHERE status = "1" and type="slider"');
        foreach ($sliderList as $item)
        {
            ?>
            <div>
                <img class="w-100" src="<?= _HOST . '/assets/images/slider/' . $item['image'] ?>" alt="Image 4" />
            </div>
            <?php
        }
        ?>
    </div>
</div>