<?php

function chatListCard(ChatSession $chatSession): string
{
    global $session, $me;

    $myId = $session->has('userId')
        ? $session->get('userId')
        : throw new ErrorException('No user ID in session');
    $chatSessionId = $chatSession->getId();

    $otherParty = $chatSession->getOtherParty();

    $otherPartyId = $otherParty->getId();
    $otherPartyType = ($otherParty instanceof User) ? 'user' : 'store';
    $otherPartyImage = htmlspecialchars(
        ($otherParty instanceof User)
            ? $otherParty->getProfileImage()
            : $otherParty->getLogo()
    );
    $otherPartyName = htmlspecialchars(
        ($otherParty instanceof User)
            ? $otherParty->getFirstName() . ' ' . $otherParty->getLastName()
            : $otherParty->getName()
    );

    $messages = $chatSession->getMessages();
    $lastMessage = (count($messages) > 0)
        ? end($messages)
        : null;
    $lastMessageSender = $lastMessage->getSender();
    $lastMessageType = $lastMessage->getType();
    $lastMessageContent = htmlspecialchars(
        ($lastMessage)
            ? $lastMessage->getContent()
            : ''
    );
    $lastMessageDate = ($lastMessage) ? $lastMessage->getCreatedAt() : new DateTime();

    $amILastSender = $lastMessageSender->getId() === $myId;

    ob_start();
?>
    <button 
        class="chat-list-card unset-button" 
        type="button" 
        data-id="<?= $chatSessionId ?>"
        data-other-party-type="<?= $otherPartyType ?>"
        data-other-party-id="<?= $otherPartyId ?>"
        data-other-party-name="<?= $otherPartyName ?>"
        data-other-party-image="<?= $otherPartyImage ?>">

        <img
            class="other-party-image circle fit-contain white-bg"
            src="<?= $otherPartyImage ?>"
            alt="<?= $otherPartyName ?>"
            title="<?= $otherPartyName ?>"
            height="40"
            width="40" />

        <section class="chat-info">
            <div class="flex-row flex-child-center-h">
                <h3 class="other-party-name black-text single-line-ellipsis" id="other_party_name"><?= $otherPartyName ?></h3>
                <img
                    class="mute-icon no-display"
                    src="<?= ICON_PATH . 'mute_b.svg' ?>"
                    alt="Mute conversation"
                    title="Mute conversation"
                    height="16" />
            </div>
            <div class="flex-row flex-space-between flex-child-end-h">
                <p class="last-message-preview single-line-ellipsis">
                    <?= $lastMessageType === ChatContentType::Text
                        ? $lastMessageContent
                        : ($amILastSender ? 'You' : $otherPartyName) . ' sent a ' . strtolower($lastMessageType === ChatContentType::Image ? 'image' : 'video') . '.' ?>
                </p>
                <p class="last-chat-date end-text"><?= simplifyDate($lastMessageDate) ?></p>
            </div>
        </section>
    </button>
<?php
    return ob_get_clean();
}
