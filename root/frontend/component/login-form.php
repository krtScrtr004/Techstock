<form action="" method="POST">
    <h3 class="black-text">Log In</h3>

    <input type="email" name="l_email" id="l_email" placeholder="Please enter your email here" autocomplete="on" min="3" max="255" required>

    <div class="password-toggle-wrapper">
        <img class="absolute" src="<?php echo htmlspecialchars(REL_ICON_PATH . 'show.svg'); ?>" alt="Show password icon" title="Show password icon" width="18" height="18" />

        <input type="password" name="l_password" id="l_password" placeholder="Please enter your password here" min="8" max="255" required>
    </div>

    <button class="blue-bg white-text" type="submit">LOG IN</button>
</form>

<a class="inline black-text" href="#">Forget Password</a>

<div class="line-divider relative">
    <hr>
    <p class="white-bg absolute">OR</p>
</div>

<section class="oath-provider-link">
    <div>
        <img src="<?php echo htmlspecialchars(REL_ICON_PATH . 'facebook.svg'); ?>" alt="Facebook Logo" title="Facebook Logo" width="45" height="45">

        <h3>Facebook</h3>
    </div>

    <div>
        <img src="<?php echo htmlspecialchars(REL_ICON_PATH . 'google.svg'); ?>" alt="Google Logo" title="Google Logo" width="45" height="45">

        <h3>Google</h3>
    </div>
</section>

<p class="block center-text">New to Techstock? <a class="blue-text" href="#">Sign Up</a></p>