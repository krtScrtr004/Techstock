<?php

function renderRatingCard(Rating $rating)
{
    ob_start();

    $rater = $rating->getRater();
    if (!isset($rater))
        throw new BadFunctionCallException('No rater defined in rating object.');

    $images = $rating->getImages();
    $reply = $rating->getReply();
    ?>
    <section class="rating-card flex-row" data-rating="<?= htmlspecialchars($rating->getRating()) ?>">
        <!-- User Profile -->
        <section class="user-profile">
            <img class="circle" src="<?= htmlspecialchars($rater->getProfileImage()) ?>" alt="User profile" title="User profile" height="45" width="45">
        </section>

        <!-- Main Content -->
        <section class="main-content">
            <!-- Rating Info -->
            <section class="rating-info flex-col">
                <h3><?= htmlspecialchars($rater->getFirstName() . ' ' . $rater->getLastName()) ?></h3>
                <?= renderRatingStars($rating->getRating(), size: 11) ?>
                <p class="date"><?= formatDateTime($rating->getCreatedAt()) ?></p>
            </section>

            <!-- Rating Content -->
            <section class="rating-content">
                <!-- Comment -->
                <p class="comment">
                    <?= htmlspecialchars($rating->getComment()) ?>
                </p>

                <!-- Images -->
                <?php if (isset($images)): ?>
                    <div class="images flex-row flex-child-start-v flex-wrap">
                        <?php foreach ($rating->getImages() as $imageLink): ?>
                            <img src="<?= htmlspecialchars($imageLink) ?>" alt="Rating image" title="Rating image" height="75" width="75">
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>

            <!-- Rating Reply -->
            <?php if (isset($reply)): ?>
                <section class="rating-reply dark-white-bg">
                    <h3 class="black-text">Seller's Reply</h3>

                    <p class="black-text"><?= htmlspecialchars($reply->getReply()) ?></p>

                    <p class="date end-text"><?= formatDateTime($reply->getCreatedAt()) ?></p>
                </section>
            <?php endif; ?>

            <section class="flex-row">
                <button class="like-rating unset-button">
                    <img src="<?= ICON_PATH . ($rating->getIsLike() ? 'like_bl.svg' : 'like_dw.svg') ?>" alt="Like rating" title="Like rating" height="16" width="16">
                </button>

                <p class="inline"><?= htmlspecialchars($rating->getLike()) ?></p>
            </section>
        </section>
    </section>
    <?php

    return ob_get_clean();
}
