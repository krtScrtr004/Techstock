<?php

function changePasswordForm($component): void
{
?>
    <p class="center-text"><?= $component['description']; ?></p>

    <article class="form-message error">
        Invalid password format.
    </article>

    <form action="" method="POST">
        <input type="text" name="s_password" id="s_password" placeholder="Enter your password here" min="8" max="255" required>

        <!-- Password validator guide -->
        <ul class="flex-col password-list-validator">
            <li id="lower_case">At least one lowercase character</li>
            <li id="upper_case">At least one uppercase character</li>
            <li id="count">8 to 255 characters</li>
            <li id="characters">Only letters, numbers, and common punctuation (! @ ' . -) can be used</li>
        </ul>

        <button class="blue-bg white-text" type="submit">SUBMIT</button>
    </form>
<?php
}

function forgetPasswordForm(): void
{
?>
    <form action="" method="POST">
        <input
            type="email"
            name="fp_email"
            id="fp_email"
            placeholder="Please enter your email here"
            autocomplete="on"
            min="3"
            max="255"
            required />

        <button class="blue-bg white-text">NEXT</button>
    </form>
<?php
}
