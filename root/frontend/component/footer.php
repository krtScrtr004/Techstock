<!-- TODO -->
<?php $hasSession = $session->isSet() ?>

<footer class="footer black-bg <?= ((!$hasSession) ? 'flex-row' : '') ?>">
    <section class="footer-links flex-row flex-space-between">
        <?php if ($hasSession): ?>
        <section>
            <h3>Navigate Our Site</h3>
            <ul>
                <li><a href="<?= htmlspecialchars(REDIRECT_PATH . 'home'); ?>">Home</a></li>
                <li><a href="">My Orders</a></li>
                <li><a href="">My Cart</a></li>
                <li><a href="">My Profile</a></li>
                <li><a href="">Become a Seller</a></li>
                <li><a href="">About Us</a></li>
            </ul>
        </section>
        <?php endif; ?>

        <section>
            <h3>Contacts</h3>
            <ul>
                <li>Email: support@teckstock.ph</li>
                <li>Hotline: +63 900 123 4567</li>
                <li>Cellular: 09196738199</li>
            </ul>
        </section>

        <section>
            <h3>Legal</h3>
            <ul>
                <li><a href="">Terms & Conditions</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Buyer Protection Policy</a></li>
                <li><a href="">Seller Policy or Guidelines</a></li>
                <li><a href="">Return & Refund Policy</a></li>
            </ul>
        </section>
    </section>

    <section class="footer-static flex-col center-child">
        <img src="<?= LOGO_PATH . 'logo_complete_ver.svg' ?>" alt="Techstock logo" title="Techstock logo" height="69">

        <p>&copy; Techstock Philippines. All rights reserved.</p>
    </section>

</footer>