<?php

/**
 * A function that will display the basic header and 
 * the title of the header, based on the passed parameter
 */
function basicHeader($title) {
    ?>
    <div class="ms-bg-primary">
        <div class="container"><br>
            <div class="ms-hero-body">
                <h3 class="ms-hero-title ms-text-white"><?php echo $title ?></h3>
            </div><br>
        </div>
    </div><br><br>
    <?php
}