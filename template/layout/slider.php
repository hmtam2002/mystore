<!-- slider -->
<div class="slideshow wrap-content">

    <div class="slider">
        <?php
        $sliderList = $db->getRaw('SELECT * FROM images WHERE status = "1" and type="slider"');
        foreach ($sliderList as $item)
        {
            ?>
            <div>
                <img src="<?= _HOST . '/assets/images/slider/' . $item['image'] ?>" alt="Image 4" />
            </div>
            <?php
        }
        ?>
    </div>

</div>