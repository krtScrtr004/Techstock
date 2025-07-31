<section class="chat-wrapper fixed">
    <section class="white-bg">
        <!-- Chat Aside -->
        <aside>
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
                <div class="chat-list-card flex-row flex-child-center-h">
                    <img 
                        class="circle fit-contain white-bg"
                        src="<?= IMAGE_PATH . 'brand logo/acer.png' ?>" 
                        alt=""
                        title=""
                        height="40"
                        width="40" />

                    <section class="chat-info">
                        <h3 class="black-text">Store Name</h3>
                        <div class="flex-row flex-space-between flex-child-end-h">
                            <p class="last-message-preview single-line-ellipsis">The is the last message of the store or the user</p>
                            <p class="last-chat-date end-text"><?= simplifyDate(new DateTime()) ?></p>
                        </div>
                    </section>
                </div>
            </section>
        </aside>


    </section>
</section>