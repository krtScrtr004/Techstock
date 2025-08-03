<?php

function messageBox(ChatMessage $message): mixed
{
    global $session;

    ob_start();

    $myId               =   $session->has('userId')
        ? $session->get('userId')
        : throw new ErrorException('No user ID in session');

    $type               =   $message->getType();
    $content            =   $message->getContent();
    $createdAt          =   $message->getCreatedAt();

    $sender             =   $message->getSender();
    $isSame             =   $sender->getId() === $myId;
    $flexDirection      =   $isSame ? 'flex-row' : 'flex-row-reverse';
    $messageAlignment   =   $isSame ? 'float-right' : 'float-left';
?>

    <div class="message-row <?= $flexDirection ?>">
        <div class="message-box white-bg <?= $messageAlignment ?>">
            <?php if ($type === ChatContentType::Text): ?>
                <p class="black-text"><?= $content ?></p>
            <?php elseif ($type === ChatContentType::Image): ?>
                <img
                    src="<?= $content ?>"
                    alt=""
                    width="300" />
            <?php elseif ($type === ChatContentType::Video): ?>
                <!-- TODO -->
            <?php endif; ?>

            <span class="block end-text"><?= simplifyDate($createdAt) ?></span>
        </div>

        <div>
            <button class="react-button unset-button">
                <img
                    src="<?= ICON_PATH . 'heart_empty.svg' ?>"
                    alt="Like"
                    title="Like"
                    height="24" />
            </button>
        </div>
    </div>

<?php
    return ob_get_flush();
}
