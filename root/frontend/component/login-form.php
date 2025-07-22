<article class="form-message success center-text">
    Incorrect email or password.
</article>

<form action="" method="POST">
    <input 
        type="email" 
        name="l_email" 
        id="l_email" 
        placeholder="Please enter your email here" 
        autocomplete="on" 
        min="3" 
        max="255" 
        required />

    <div class="password-toggle-wrapper">
        <img 
            class="back-button absolute" 
            src="<?= ICON_PATH . 'show.svg'; ?>" 
            alt="Show password" 
            title="Show password" 
            width="18" height="18" />

        <input 
            type="password" 
            name="l_password" 
            id="l_password" 
            placeholder="Please enter your password here" 
            min="8" 
            max="255" 
            required />
    </div>

    <button class="blue-bg white-text" type="submit">LOG IN</button>
</form>

<a class="inline black-text" href="<?= REDIRECT_PATH . 'forget-password'; ?>">Forget Password</a>

<div class="line-divider relative">
    <hr>
    <p class="white-bg absolute">OR</p>
</div>

<section class="oath-provider-link">
    <button type="button" class="unset-button">
        <img 
            src="<?= ICON_PATH . 'facebook.svg'; ?>" 
            alt="Facebook log in" 
            title="Facebook log in" 
            width="45" 
            height="45" />

        <h3>Facebook</h3>
    </button>

    <button type="button" class="unset-button">
        <img 
            src="<?= ICON_PATH . 'google.svg'; ?>" 
            alt="Google log in" 
            title="Google log in" 
            width="45" 
            height="45" />

        <h3>Google</h3>
    </button>
</section>

<p class="block center-text">
    New to Techstock? <a class="blue-text" href="<?= REDIRECT_PATH . 'signup'; ?>">Sign Up</a>
</p>