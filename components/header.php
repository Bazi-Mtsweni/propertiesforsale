<header>
    <div class="contact-strip flex">
        <div class="social-media">
            <i class="fa-brands fa-linkedin" title="Visit Our Linkedin Page"></i>
            <i class="fa-brands fa-square-x-twitter" title="Visit Our X Account"></i>
        </div>
        <div class="contact-info flex">
            <div class="phone flex">
                <i class="fa-solid fa-square-phone"></i>
                <p>+27(0) 83 251 1846</p>
            </div>
            <div class="email flex">
                <i class="fa-solid fa-square-envelope"></i>
                <p>info@propertiesforsaleza.co.za</p>
            </div>
        </div>
    </div>
    <nav class="flex">
        <i class="fa-solid fa-bars" id="menu-bars"></i>
        <div class="logo image-container">
            <a href="#"><img src="<?php echo BASE_URL. '/images/property-for-sale-logo.svg'?>" alt="Properties For Sale Springs Logo"></a>
        </div>
        <ul class="flex-res menu" id="nav-menu">
            <div class="mobile-title flex">
                <p>Website Menu</p>
                <i class="fa-solid fa-xmark" onclick="closeMenu();"></i>
            </div>
            <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
            <li><a href="<?php echo BASE_URL. '#about'; ?>">About Us</a></li>
            <li><a href="<?php echo BASE_URL. '#services'; ?>">Our Services</a></li>
            <li><a href="<?php echo BASE_URL. '#approach'; ?>">Our Approach</a></li>
            <li class="contact btn-primary"><a href="<?php echo BASE_URL. '#contact-us'; ?>">Contact Us</a></li>
        </ul>

    </nav>
</header>