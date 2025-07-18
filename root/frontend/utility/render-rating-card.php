<?php

function ratingCard(Rating $rating)
{
    ob_start();

    $rater = $rating->getRater();
    if (!isset($rater))
        throw new BadFunctionCallException('No rater defined in rating object.');

    $raterName      =   htmlspecialchars($rater->getFirstName() . ' ' . $rater->getLastName());
    $raterProfile   =   htmlspecialchars($rater->getProfileImage());

    $images         =   $rating->getImages();
    $ratingCount    =   htmlspecialchars($rating->getRating());
    $comment        =   htmlspecialchars($rating->getComment());
    $likeCount      =   htmlspecialchars($rating->getLike());
    $isLike         =   $rating->getIsLike();
    $ratingDate     =   htmlspecialchars(formatDateTime($rating->getCreatedAt()));

    $reply          =   $rating->getReply();
?>
    <section class="rating-card flex-row" data-rating="<?= $ratingCount ?>">
        <!-- User Profile -->
        <section class="user-profile">
            <img
                class="circle"
                src="<?= $raterProfile ?>"
                alt="User profile"
                title="User profile"
                height="45"
                width="45" />
        </section>

        <!-- Main Content -->
        <section class="main-content">
            <!-- Rating Info -->
            <section class="rating-info flex-col">
                <h3><?= $raterName ?></h3>
                <?= ratingStars($ratingCount, size: 11) ?>
                <p class="date"><?= $ratingDate ?></p>
            </section>

            <!-- Rating Content -->
            <section class="rating-content">
                <!-- Comment -->
                <p class="comment">
                    <?= $comment ?>
                </p>

                <!-- Images -->
                <?php if (isset($images)): ?>
                    <div class="images flex-row flex-child-start-v flex-wrap">
                        <?php
                        foreach ($images as $imageLink):
                            $imageLink = htmlspecialchars($imageLink);
                        ?>
                            <img
                                src="<?= $imageLink ?>"
                                alt="Rating image"
                                title="Rating image"
                                height="75"
                                width="75" />
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>

            <!-- Rating Reply -->
            <?php
            if (isset($reply)):
                $replyMessage   =   htmlspecialchars($reply->getReply());
                $replyDate      =   htmlspecialchars(formatDateTime($reply->getCreatedAt()));
            ?>
                <section class="rating-reply dark-white-bg">
                    <h3 class="black-text">Seller's Reply</h3>

                    <p class="black-text"><?= $replyMessage ?></p>

                    <p class="date end-text"><?= $replyDate ?></p>
                </section>
            <?php endif; ?>

            <section class="flex-row">
                <button class="like-rating unset-button">
                    <img 
                        src="<?= ICON_PATH . ($isLike ? 'like_bl.svg' : 'like_dw.svg') ?>" 
                        alt="Like rating" 
                        title="Like rating" 
                        height="16" 
                        width="16" />
                </button>

                <p class="inline"><?= $likeCount ?></p>
            </section>
        </section>
    </section>
<?php

    return ob_get_clean();
}
