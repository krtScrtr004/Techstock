<?php

function categoryChain(ProductCategory $category, $name): void
{
    $name = htmlspecialchars($name);

    echo '<ul class="category-chain flex-row">';
    
    $category->first();
    while (true) {
        $current        =   htmlspecialchars($category->current());
        $categoryUrl    =   urlencode(strtolower($current));
        echo '<li>
                <a class="blue-text" href="' . REDIRECT_PATH . 'search?category=' . $categoryUrl . '&page=1">' 
                    . $current . 
                '</a>
            </li>';

        echo '<li class="black-text">&nbsp; &gt; &nbsp;</li>';

        if (!$category->hasNext()) 
            break;
        
        $category->next();
    }
    echo '<li class="single-line-ellipsis black-text" title="'. $name .'">' . $name . '</li>';

    echo '</ul>';
}
