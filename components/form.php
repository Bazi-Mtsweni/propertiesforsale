<div class="pop-form-container" id="pop-form">
    <div class="pop-form">
        <h2>We are here to help you make well informed decisions.</h2>
        <h3>Our team of highly experienced experts is ready to assist you in making your property dreams a reality.</h3>
        <i class="fa-solid fa-xmark" onclick="closeForm(this);" title="Close Form"></i>
        <form action="" class="form">
            <input type="hidden" aria-hidden="true" id="form_id" name="form_id" value="pop-form">
            <div class="input">
                <input type="text" name="name" id="float-name" placeholder="Your Full Name *" required onkeyup="validateName(this, 'float-name-error');">
                <div class="error" id="float-name-error"></div>
            </div>
            <div class="input">
                <input type="tel" name="tel" id="float-tel" placeholder="Contact Number *" required onkeyup="validateTel(this, 'float-tel-error');">
                <div class="error" id="float-tel-error"></div>
            </div>
            <div class="input">
                <input type="email" name="email" id="float-email" placeholder="Email Address *" required onkeyup="validateEmail(this, 'float-email-error');">
                <div class="error" id="float-email-error"></div>
            </div>
            <p>Which service do you need us to help with?</p>
            <div class="radios flex">
                <label>
                    <input type="radio" name="service" id="radio" value="Property Sales" checked>
                    Property Sales
                </label>
                <label>
                    <input type="radio" name="service" id="radio" value="Property Development">
                    Property Development
                </label>
            </div>
            <div class="agreement flex">
                <p class="orange">By ticking this box you agree that Property For Sale may store your information and contact you regarding your business</p>
                <input type="checkbox" name="agreement" id="agreement" required>
            </div>
            <input type="hidden" aria-hidden="true" name="token" id="token-response" value="">
            <input type="hidden" name="bot-check" id="bot-check">
            <button class="submit-btn btn-primary" id="form-submit" data-sitekey="<?php echo $SITE_KEY; ?>">
                <span>Send Message</span>
                <img id="form-loader" class="submit-btn-loader" src="./images/loader.gif" alt="Button Loader" title="Loading..." style="display: none;">
            </button>
        </form>
    </div>
</div>