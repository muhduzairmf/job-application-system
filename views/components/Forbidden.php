<?php

/**
 * A function that will display the forbidden message
 * if the user try to access the page that are not
 * appropriate for them
 */
function forbidden($homeurl) {
    ?>
    <style>
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
    <div class="ms-bg-action2 centered">
        <div>
            <h3 class="center-text ms-text-white">403 Forbidden Error. You cannot access this page.</h3>
            <a href="<?php echo $homeurl; ?>" class="ms-text-white"><u><i class="bi bi-arrow-left"></i>Back to home page</u></a>
        </div>
    </div>
    <?php
}