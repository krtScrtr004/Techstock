<?php



function renderDialog(bool $status, string $title, string $message)
{
    $icons = ['confirm.svg', 'reject.svg'];

    ?>
    <section class="modal-wrapper">
        <div class="dialog">
            <img src="<?php echo htmlspecialchars(ICON_PATH . ($status ? $icons[0] : $icons[1])); ?>" alt="Result icon" title="Result icon" height="69" width="69">

            <h1 class="center-text"><?php echo htmlspecialchars($title); ?></h1>
            <p class="center-text"><?php echo htmlspecialchars($message); ?></p>

            <button class="<?php echo $status ? 'blue-bg'  : 'red-bg'?> white-text">OKAY</button>
        </div>
    </section>
    <?php
}

function errorOccuredDialog() {
    renderDialog(
        false,
        'Error Occured',
        'An error occured. Please try again later.'
    );
}

function changePasswordDialog(bool $status): void
{
    if ($status) {
        renderDialog(
            true,
            'Password Reset',
            'Your password was changed successfully.'
        );
    } else {
        renderDialog(
            false,
            'Password Reset',
            'There was a problem changing your password. Please try again.'
        );
    }
}

function tooManyAttemptDialog(): void {
    renderDialog(
        false,
        'Too Many Attempt',
        'Access temporarily locked due to multiple failed attempts. Try again in 2 minutes.'
    );
}
