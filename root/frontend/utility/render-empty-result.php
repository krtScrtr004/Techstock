<?php

function emptyGridResult(): void
{
?>
    <div class="empty-result flex-col center-child transparent-bg full-body-content">
        <img
            src="<?= ICON_PATH . 'empty-list_b.svg' ?>"
            alt="No results found"
            title="No results found"
            height="45" />

        <h3 class="black-text">No Products Found!</h3>
        <p class="light-black-text">Try different or more general keywords</p>
    </div>
<?php
}
