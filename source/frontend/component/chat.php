<section class="chat-wrapper fixed">
    <section class="flex-row white-bg">
        <!-- Chat Aside -->
        <aside class="flex-col">
            <section class="search-chat">
                <form class="search-chat-form" action="" method="POST">
                    <div class="center-child">
                        <img
                            src="<?= ICON_PATH . 'search_b.svg' ?>"
                            alt="Search chat"
                            title="Search chat"
                            height="16" />

                        <input
                            class="search-chat-input black-text"
                            type="text"
                            id="search_chat_input"
                            name="search_chat_input"
                            placeholder="Search"
                            min="1"
                            max="255" />
                    </div>
                </form>
            </section>

            <!-- Chat List -->
            <section class="chat-list flex-col">
                <?php
                $myId = $session->has('userId')
                    ? $session->get('userId')
                    : throw new ErrorException('No user ID in session');

                foreach ($chatSessions as $chatSession):
                    $chatSessionId = $chatSession->getId();

                    $otherParty = $chatSession->getOtherParty();

                    $otherPartyId = $otherParty->getId();
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
                ?>
                    <button class="chat-list-card unset-button" type="button" data-id="<?= $chatSessionId ?>">
                        <input
                            type="hidden"
                            name="other_party_id"
                            id="other_party_id"
                            value="<?= $otherPartyId ?>" />

                        <img
                            class="other-party-image circle fit-contain white-bg"
                            src="<?= $otherPartyImage ?>"
                            alt="<?= $otherPartyName ?>"
                            title="<?= $otherPartyName ?>"
                            height="40"
                            width="40" />

                        <section class="chat-info">
                            <h3 class="other-party-name black-text" id="other_party_name"><?= $otherPartyName ?></h3>
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
                <?php endforeach; ?>
            </section>
        </aside>

        <section class="chat-content flex-col flex-space-between flex-child-center-v relative">
            <div class="select-chat-wall dark-white-bg absolute">
                <?php
                emptyResult(
                    'chat_b.svg',
                    'Select A Chat First'
                )
                ?>
            </div>

            <div class="message-error-occurred dark-white-bg absolute no-display">
                <?php
                emptyResult(
                    'chat_b.svg',
                    'There Was An Error Fetching Your Conversation!'
                )
                ?>
            </div>

            <!-- Heading -->
            <section class="chat-content-heading flex-row flex-child-center-h white-bg relative">
                <img
                    class="other-party-image circle fit-contain white-bg"
                    src=""
                    alt=""
                    title=""
                    height="45" />

                <div class="other-party-info">
                    <h3 class="other-party-name single-line-ellipsis black-text"> <!-- Other Party Name--> </h3>
                    <p class="other-party-id black-text"> <!-- Other Party Id--> </p>
                </div>

                <div class="more-options flex-row-reverse flex-child-center-h relative">
                    <button class="unset-button" type="button">
                        <img
                            class="circle"
                            src="<?= ICON_PATH . 'more_b.svg' ?>"
                            alt="More options"
                            title="More options"
                            height="30" />
                    </button>

                    <!-- Dropdown -->
                    <section class="dropdown white-bg absolute no-display">
                        <button class="unset-button" type="button">
                            <a href="" class="black-text">View Store</a>
                        </button>

                        <hr>

                        <button class="unset-button" type="button">
                            <p class="black-text">Mute</p>
                        </button>
                        <button class="unset-button" type="button">
                            <p class="black-text">Block Store</p>
                        </button>

                        <hr>

                        <button class="unset-button" type="button">
                            <p class="black-text">Report</p>
                        </button>
                    </section>
                </div>
            </section>

            <!-- Main Content -->
            <section class="chat-content-main flex-col dark-white-bg">
                <div class="no-messages dark-white-bg no-display full-body-content">
                    <?php
                    emptyResult(
                        'chat_b.svg',
                        'No Messages Found!',
                        "Start A New Conversation",
                        'small'
                    )
                    ?>
                </div>

                <!-- Messages Area -->
                <section class="messages-area dark-white-bg relative">
                    <div class="sentinel"></div>

                    <section class="messages-container flex-col">
                        <!-- Messages Here -->
                    </section>

                    <section class="new-message-button sticky no-display">
                        <button
                            class="blue-bg white-text center-text"
                            type="button">
                            New Message(s) Arrived!
                        </button>
                    </section>
                </section>

                <!-- Input Area -->
                <section class="write-message-area white-bg relative">
                    <section class="media-preview white-bg no-display">
                        <!-- Media Preview -->
                    </section>

                    <form action="">
                        <section>
                            <input
                                class="written-message-content transparent-bg"
                                type="text"
                                id="written_message_content"
                                name="written_message_content"
                                placeholder="Type a message here..."
                                min="1"
                                max="500" />
                        </section>

                        <section class="flex-row flex-space-between transparent-bg">
                            <section class=" flex-row media-picker">
                                <!-- Image Picker -->
                                <div class="image-picker">
                                    <input
                                        class="no-display"
                                        type="file"
                                        name="image_upload[]"
                                        id="image_upload"
                                        accept="image/*"
                                        multiple />
                                    <button class="open-file-picker-button unset-button" type="button">
                                        <img
                                            src="<?= ICON_PATH . 'image_b.svg' ?>"
                                            alt="Include an image"
                                            title="Include an image"
                                            height="32" />
                                    </button>
                                </div>

                                <!-- Video Picker -->
                                <div class="video-picker">
                                    <input
                                        class="no-display"
                                        type="file"
                                        name="video_upload[]"
                                        id="video_upload"
                                        accept="video/*"
                                        multiple />
                                    <button class="open-file-picker-button unset-button" type="button">
                                        <img
                                            src="<?= ICON_PATH . 'video_b.svg' ?>"
                                            alt="Include a video"
                                            title="Include a video"
                                            height="32" />
                                    </button>
                                </div>
                            </section>

                            <button class="send-message-button unset-button" type="button">
                                <img
                                    src="<?= ICON_PATH . 'send_bl.svg' ?>"
                                    alt="Send"
                                    title="Send"
                                    height="32" />
                            </button>
                        </section>

                    </form>
                </section>
            </section>
        </section>
    </section>
</section>