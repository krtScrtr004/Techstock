<?php

function renderDialog(bool $status, string $id, string $title, string $message)
{
    $icons      =   ['confirm.svg', 'reject.svg'];

    $id         =   htmlspecialchars($id);
    $statusIcon =   $status ? $icons[0] : $icons[1];
    $title      =   htmlspecialchars($title);
    $message    =   htmlspecialchars($message);

    ?>
    <section id="<?= $id ?>" class="modal-wrapper">
        <section class="dialog white-bg">
            <img 
                src="<?= ICON_PATH . $statusIcon; ?>" 
                alt="Result icon" 
                title="Result icon" 
                height="69" 
                width="69" />

            <h1 class="center-text"><?= $title ?></h1>
            <p class="center-text"><?= $message ?></p>

            <button class="okay-button <?= $status ? 'blue-bg'  : 'red-bg'?> white-text">OKAY</button>
        </section>
    </section>
    <?php
}

function errorOccurredDialog() {
    renderDialog(
        false,
        'error-occurred-dialog',
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
