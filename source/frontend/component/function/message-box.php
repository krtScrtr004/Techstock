<?php

function messageBox(ChatMessage $message): mixed
{
    global $session;

    ob_start();

    $myId               =   $session->has('userId')
        ? $session->get('userId')
        : throw new ErrorException('No user ID in session');

    $id                 =   htmlspecialchars($message->getId());
    $type               =   $message->getType();
    $content            =   htmlspecialchars($message->getContent());
    $createdAt          =   $message->getCreatedAt();

    $sender             =   $message->getSender();
    $isSame             =   $sender->getId() === $myId;
    $flexDirection      =   $isSame ? 'flex-row-reverse' : 'flex-row';
    $messageAlignment   =   $isSame ? 'float-right' : 'float-left';

    $boxBackground      =   $type === ChatContentType::Text ? 'white-bg' : 'transparent-bg';
?>

    <div class="message-row <?= $flexDirection ?> relative" data-id="<?= $id ?>">
        <div class="message-box-menu no-display white-bg absolute">
            <?php if ($isSame): ?>
                <button class="delete-button unset-button">
                    <p class="black-text">Delete</p>
                </button>
            <?php endif; ?>

            <button class="report-button unset-button">
                <p class="black-text">Report</p>
            </button>
        </div>

        <div class="message-box <?= $boxBackground . ' ' . $messageAlignment; ?>">
            <?php if ($type === ChatContentType::Text): ?>
                <p class="black-text"><?= $content ?></p>
            <?php elseif ($type === ChatContentType::Image): ?>
                <img
                    class="viewable-image"
                    src="<?= $content ?>"
                    alt=""
                    width="300">
            <?php elseif ($type === ChatContentType::Video): ?>
                <!-- TODO -->
                <video controls>
                    <source src="<?= $content ?>" type="video/mp4">
                    <source src="<?= $content ?>" type="video/webm">
                    Your browser does not support video player
                </video>
            <?php endif; ?>

            <span class="block end-text"><?= simplifyDate($createdAt) ?></span>
        </div>

        <div class="center-child flex-col">
            <button class="react-button unset-button">
                <img
                    src="<?= ICON_PATH . 'heart_empty.svg' ?>"
                    alt="Like"
                    title="Like"
                    height="24">
            </button>
            <p class="reaction-count light-black-text">0</p>
        </div>
    </div>

<?php
    return ob_get_clean();
}
