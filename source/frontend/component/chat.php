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
                <?php for ($i = 0; $i < 100; $i++): ?>
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
                <?php endfor; ?>
            </section>
        </aside>


        <section class="chat-content flex-col flex-space-between flex-child-center-v">
            <!-- Heading -->
            <section class="chat-content-heading flex-row white-bg">
                <img
                    class="store-logo circle fit-contain white-bg"
                    src="<?= IMAGE_PATH . 'brand logo/acer.png' ?>"
                    alt=""
                    title=""
                    height="45" />

                <div class="store-info">
                    <h3 class="single-line-ellipsis black-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, rerum quae! Ratione nisi nemo perspiciatis voluptates nulla iste laboriosam quia neque aspernatur tempora, optio laudantium facilis sint obcaecati voluptatibus consequatur.</h3>
                    <p class="black-text">sid9-23jjc-djs19</p>
                </div>

                <div class="more-options flex-row-reverse flex-child-center-h relative">
                    <img
                        class="circle"
                        src="<?= ICON_PATH . 'more_b.svg' ?>"
                        alt="More options"
                        title="More options"
                        height="30" />

                    <!-- Dropdown -->
                    <section class="dropdown white-bg absolute no-display">
                        <button class="unset-button">
                            <a href="" class="black-text">View Store</a>
                        </button>

                        <hr>

                        <button class="unset-button">
                            <p class="black-text">Mute</p>
                        </button>
                        <button class="unset-button">
                            <p class="black-text">Block Store</p>
                        </button>

                        <hr>

                        <button class="unset-button">
                            <p class="black-text">Report</p>
                        </button>
                    </section>
                </div>
            </section>


            <section class="chat-content-main dark-white-bg">

            </section>
        </section>
    </section>
</section>