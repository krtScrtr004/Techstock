<?php

function renderCategoryChain($category, $name): void
{
    $name = htmlspecialchars($name);

    echo '<ul class="category-chain flex-row">';
    
    $category->rewind();
    while ($category->valid()) {
        $current = htmlspecialchars($category->current());
        echo '<li>
                <a class="blue-text" href="' . REDIRECT_PATH . 'search?category=' . urlencode(strtolower($current)) . '&page=1">' 
                    . $current . 
                '</a>
            </li>';

        echo '<li class="black-text">&nbsp; &gt; &nbsp;</li>';

        $category->next();
    }
    echo '<li class="single-line-ellipsis black-text" title="'. $name .'">' . $name . '</li>';

    echo '</ul>';
}
