<h3 class="black-text">Sign Up</h3>

<article class="form-message success center-text">
    Invalid email.
</article>

<form action="" method="POST">
    <input type="email" name="s_email" id="s_email" placeholder="Please enter your email here" autocomplete="on" min="3" max="255" required>

    <button class="blue-bg white-text" type="submit">NEXT</button>
</form>

<div class="line-divider relative">
    <hr>
    <p class="white-bg absolute">OR</p>
</div>

<section class="oath-provider-link">
    <div>
        <img src="<?php echo htmlspecialchars(ICON_PATH . 'facebook.svg'); ?>" alt="Facebook Logo" title="Facebook Logo" width="45" height="45">

        <h3>Facebook</h3>
    </div>

    <div>
        <img src="<?php echo htmlspecialchars(ICON_PATH . 'google.svg'); ?>" alt="Google Logo" title="Google Logo" width="45" height="45">

        <h3>Google</h3>
    </div>
</section>

<div class="flex-row flex-child-center-v">
    <p class="agreement center-text">By signing up, you agree to Trchstock's <a class="blue-text" href="">Terms and Conditions</a> and <a class="blue-text" href="">Privacy Policy</a>.</p>
</div>

<p class="block center-text">Already have an account? <a class="blue-text" href="<?php echo htmlspecialchars(REDIRECT_PATH . 'login'); ?>">Log In</a></p>