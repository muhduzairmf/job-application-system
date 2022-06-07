<?php

/**
 * A function that will display the navigation bar
 * for manager.php
 */
function navManager() {
    ?>
    <div class="ms-menu">
        <div class="ms-menu-logo">
            <a href="/" target="_blank"><img src="https://portalvhds11000v9mfhk0k.blob.core.windows.net/travel/HISnew.png" /></a>
        </div>
        <nav class="ms-menu-link">
            <input type="checkbox" id="ms-menu-toggle" />
            <label for="ms-menu-toggle" class="ms-menu-icon"
                ><p>&#9776;</p></label>
            <ul>
                <li><a href="/manager.php?tab=home&section=main">Home</a></li>
                <li><a href="/manager.php?tab=job&section=main">Job</a></li>
                <li><a href="/manager.php?tab=message&section=main">Message</a></li>
                <li><a href="/manager.php?tab=profile&section=user-detail">Profile</a></li>
                <li>
                    <div class="ms-dropdown">
                        <button class="ms-btn">
                            <i class="bi bi-person-circle"></i>&nbsp;&nbsp;Manager
                        </button>
                        <div class="ms-dropdown-content">
                            <ul class="ms-dropdown-content-list" style="height:auto;width:auto;">
                            <form action="/auth/Logout.auth.php" method="post">
                                <button class="ms-btn" type="submit" style="display:block;margin:auto;">Logout</button>
                            </form>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <?php
}