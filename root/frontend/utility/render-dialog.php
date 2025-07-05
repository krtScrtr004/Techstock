<?php

function renderDialog(bool $status, string $id, string $title, string $message)
{
    $icons = ['confirm.svg', 'reject.svg'];

    ?>
    <section id="<?= htmlspecialchars($id); ?>" class="modal-wrapper">
        <div class="dialog">
            <img src="<?= htmlspecialchars(ICON_PATH . ($status ? $icons[0] : $icons[1])); ?>" alt="Result icon" title="Result icon" height="69" width="69">

            <h1 class="center-text"><?= htmlspecialchars($title); ?></h1>
            <p class="center-text"><?= htmlspecialchars($message); ?></p>

            <button class="<?= $status ? 'blue-bg'  : 'red-bg'?> white-text">OKAY</button>
        </div>
    </section>
    <?php
}

function errorOccurredDialog() {
    renderDialog(
        false,
        'error-occured-dialog',
        'Error Occurred',
        'An error occurred. Please try again later.'
    );
}

function changePasswordDialog(bool $status): void
{
    if ($status) {
        renderDialog(
            true,
            'change-password-success-dialog',
            'Password Reset',
            'Your password was changed successfully.'
        );
    } else {
        renderDialog(
            false,            
            'change-password-error-dialog',
            'Password Reset',
            'There was a problem changing your password. Please try again.'
        );
    }
}

function tooManyAttemptDialog(): void {
    renderDialog(
        false,
        'too-many-attempt-dialog',
        'Too Many Attempt',
        'Access temporarily locked due to multiple failed attempts. Try again in 2 minutes.'
    );
}
