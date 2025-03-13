<?php
include './routes/paths.php';

//Get .env
$envFilePath = __DIR__ . '/config/.env';
$env = parse_ini_file($envFilePath);

$SITE_KEY = $env["RECAPTCHA_SITE_KEY"];
?>

<!DOCTYPE html>
<html lang="en-za">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Properties For Sale</title>

    <!-- Meta Tags-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Properties For Sale offers premium real estate development and investment opportunities in Springs, Gauteng.">
    <meta name="keywords" content="Properties, For Sale, To Let, real estate, real estate development, investment opportunities, Springs">
    <meta name="author" content="Properties For Sale">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index,follow">

    <!-- Fav Icon -->
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/index.css">

    <!-- CDNs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $SITE_KEY; ?>"></script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "Properties For Sale",
            "description": "Properties For Sale offers premium real estate development and investment opportunities in Springs, Gauteng.",
            "url": "https://www.propertiesforsale.co.za/",
            "mainEntityOfPage": {
                "@type": "Listing",
                "serviceType": "Real Estate",
                "provider": {
                    "@type": "Organization",
                    "name": "Properties For Sale",
                    "url": "https://www.propertiesforsale.co.za"
                }
            },
            "breadcrumb": {
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "https://www.propertiesforsale.co.za"
                }]
            }
        }
    </script>

</head>

<body>
    <!-- Header -->
    <?php require './components/header.php'; ?>
    <!-- Pop-up Form -->
    <?php require './components/form.php'; ?>
    <!-- Alerts -->
    <?php require './components/alerts.php'; ?>

    <!-- Hero Section -->
    <section class="hero-slider">
        <!-- Slide 1 -->
        <div class="slide active" id="slide1">
            <div class="overlay"></div>
            <div class="image-container">
                <img src="./images/home/property-in-hands.webp" alt="Luxury Property">
            </div>
            <div class="text">
                <h1>Invest in High-Value Residential & Commercial Properties</h1>
                <p>Strategic locations, innovative designs, and sustainable returns—Your trusted partner in real estate development.</p>
                <a href="#contact-us" class="btn-secondary">Explore Opportunities</a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="slide" id="slide2">
            <div class="overlay"></div>
            <div class="image-container">
                <img src="./images/home/housedoor-with-key.webp" alt="Property Management">
            </div>
            <div class="text">
                <h1>Maximize Returns with Expert Property Management</h1>
                <p>From acquisition to maintenance, we ensure high occupancy rates and long-term tenant satisfaction.</p>
                <a href="#approach" class="btn-secondary">Discover Our Approach</a>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="slide" id="slide3">
            <div class="overlay"></div>
            <div class="image-container">
                <img src="./images/home/home-interior.webp" alt="Modern Spaces">
            </div>
            <div class="text">
                <h1>Innovative Design Meets Market Expertise</h1>
                <p>We create modern, sustainable properties in high-demand urban areas for today&apos;s buyers and renters.</p>
                <a href="#services" class="btn-secondary">Partner with Us</a>
            </div>
        </div>

        <!-- Navigation Pills -->
        <div class="nav-pills">
            <span class="pill active" data-slide="0"></span>
            <span class="pill" data-slide="1"></span>
            <span class="pill" data-slide="2"></span>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="choose">
        <h2>Why Choose Properties For Sale?</h2>
        <div class="cards">
            <div class="card">
                <i class="fa-solid fa-handshake"></i>
                <h3>Expertise & Experience</h3>
                <p>With over 10 years of combined industry experience, our team understands the complexities of the real estate market</p>
                <a href="#contact-us" class="btn-secondary">Call Us Now →</a>
            </div>
            <div class="card">
                <i class="fa-solid fa-bullseye"></i>
                <h3>Strategic Location Focus</h3>
                <p>Our developments are carefully selected to align with long-term market trends, targeting areas with strong economic growth</p>
                <a class="btn-secondary" onclick="openForm();">Get Started →</a>
            </div>
            <div class="card">
                <i class="fa-solid fa-swatchbook"></i>
                <h3>Innovative Design & Sustainability</h3>
                <p>We collaborate with top-tier contractors and architects to deliver properties that reflect the latest trends</p>
                <a href="#contact-us" class="btn-secondary">Learn More →</a>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section class="about" id="about">
        <div class="left">
            <h2>About Our Business</h2>
            <p>At Properties For Sale, we are more than just a real estate investment and development company—we are visionaries shaping the future of residential and commercial spaces. With a decade of industry expertise, we specialize in acquiring, developing, and managing high-value properties in fast-growing urban markets.</p>
            <p>Our commitment to innovation, strategic location selection, and long-term market trends allows us to create properties that offer sustainable returns for investors while enhancing the lifestyles of residents and businesses. By partnering with top-tier architects, contractors, and market analysts, we ensure that every property we develop meets the highest standards of design, functionality, and sustainability.</p>
            <p>With a data-driven approach and a tenant-first mindset, we provide comprehensive real estate solutions that maximize profitability while minimizing risk. Whether you are an investor, buyer, or tenant, Properties For Sale is your trusted partner in securing high-quality, high-return real estate opportunities.</p>
        </div>
        <div class="right image-container">
            <img src="./images/home/property-office.webp" alt="Properties FOr Sale Office">
        </div>
    </section>

    <!-- Our Services -->
    <section class="services" id="services">
        <h2>What We Offer</h2>
        <div class="cards">
            <div class="card">
                <div class="image-container">
                    <img src="./images/home/property-aqcuisition.webp" alt="Property Acquisition & Development in Springs">
                </div>
                <h3>Property Acquisition & Development</h3>
                <p>We identify and acquire prime residential and commercial properties in high-growth urban areas. Our strategic approach ensures each development aligns with market demand, delivering long-term value and sustainable returns.</p>
                <a class="btn-secondary" onclick="openForm();">Talk To Us</a>
            </div>
            <div class="card">
                <div class="image-container">
                    <img src="./images/home/property-management.webp" alt="Property Management in Springs">
                </div>
                <h3>Property Management</h3>
                <p>We provide end-to-end property management, including tenant screening, rent collection, and maintenance. Our efficient systems minimize risks like late payments and property damage while ensuring high occupancy rates.</p>
                <a href="#contact-us" class="btn-secondary">Ask Us About This</a>
            </div>
            <div class="card">
                <div class="image-container">
                    <img src="./images/home/property-sales.webp" alt="Sales & Leasing in Springs">
                </div>
                <h3>Sales & Leasing</h3>
                <p>We manage the marketing, leasing, and sale of residential and commercial properties. Our proactive approach ensures properties are marketed effectively, attracting qualified tenants and serious buyers.</p>
                <a class="btn-secondary" onclick="openForm();">Request A Call</a>
            </div>
        </div>
    </section>

    <!-- Our Approach -->
    <section class="approach" id="approach">
        <h2>Our Approach</h2>
        <p>At Properties For Sale, our approach is built on strategic decision-making, operational excellence, and a commitment to delivering value. We follow a comprehensive, data-driven process to ensure every property meets market demands while maximizing returns for our investors.</p>
    </section>

    <!-- Contact Us -->
    <section class="contact-section" id="contact-us">
        <div class="form-section">
            <div class="title">
                <h2>Keep Intouch With Us</h2>
                <p>We love hearing from you. Leave us a message below and one of our highly experienced team members will be in touch with you to make your property dreams a reality.</p>
            </div>
            <form method="POST" id="contact-form" class="form">
                <input type="hidden" aria-hidden="true" id="form_id" name="form_id" value="contact-form">
                <div class="input">
                    <input type="text" name="name" id="name" placeholder="Your Name *" required onkeyup="validateName(this, 'name-error');">
                    <div class="error" id="name-error"></div>
                </div>
                <div class="contact-email flex-res">
                    <div class="input">
                        <input type="tel" name="tel" id="tel" placeholder="Contact Number *" required onkeyup="validateTel(this, 'tel-error');">
                        <div class="error" id="tel-error"></div>
                    </div>
                    <div class="input">
                        <input type="email" name="email" id="email" placeholder="Email Address *" required onkeyup="validateEmail(this, 'email-error');">
                        <div class="error" id="email-error"></div>
                    </div>
                </div>
                <div class="input">
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Leave us a message..." required onkeyup="validateMessage(this, 'message-error')" style="padding-left: .5rem;"></textarea>
                    <span id="message-error" class="error"></span>
                </div>
                <input type="hidden" aria-hidden="true" name="token" id="token-response" value="">
                <input type="hidden" name="bot-check" id="bot-check">
                <button class="submit-btn btn-primary" id="contact-submit" data-sitekey="<?php echo $SITE_KEY; ?>">
                    <span>Send Message</span>
                    <img id="contact-loader" class="submit-btn-loader" src="./images/loader.gif" alt="Button Loader" title="Loading..." style="display: none;">
                </button>
            </form>
        </div>
        <div class="contact-details flex-res">
            <div class="details">
                <div class="contacts">
                    <div class="address flex">
                        <i class="fa-solid fa-location-dot"></i>
                        <p> No. 15 5th Avenue 1st Floor <br>
                            Springs <br>
                            Gauteng <br>
                            1560 </p>
                    </div>
                    <div class="email flex">
                        <i class="fa-solid fa-envelope"></i>
                        <p>info@propertiesforsale.co.za</p>
                    </div>
                    <div class="tel flex">
                        <i class="fa-solid fa-phone"></i>
                        <p>+27(0) 83 251 1846</p>
                    </div>
                </div>
                <div class="operating-hours">
                    <h4 class="title-m">Operating Hours</h4>
                    <p>Mon - Fri: 08:30 - 17:00</p>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.22052960728!2d28.437535074724853!3d-26.25450516602317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9525ad514b5933%3A0x59e2a06fff4c6141!2s15%205th%20Ave%2C%20Springs%20New%2C%20Springs%2C%201560%2C%20South%20Africa!5e0!3m2!1sen!2sro!4v1741605342517!5m2!1sen!2sro" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php require './components/footer.php'; ?>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./js/index.js"></script>
</body>

</html>