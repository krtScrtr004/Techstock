import { redirect } from '../../utility/redirect.js'

import { dialog } from '../../render/dialog.js'

try {
    const searchFilterWrapper = document.querySelector('.search aside')

    const categoryFilterForm = searchFilterWrapper.querySelector('.category-filter>form')
    const ratingFilterButtons = searchFilterWrapper.querySelectorAll('.rating-filter>button')
    const priceFilterForm = searchFilterWrapper.querySelector('.price-filter>form')

    const categoryCheckboxes = Array.from(categoryFilterForm.querySelectorAll('input[type="checkbox"]'))
    const minPriceInput = priceFilterForm.querySelector('#min_price')
    const maxPriceInput = priceFilterForm.querySelector('#max_price')

    const clearButton = searchFilterWrapper.querySelector('button.clear')
    const applyButton = searchFilterWrapper.querySelector('button.apply')

    let filters = new Object()
    let lastCheckedRating

    function setFilterFromUrl() {
        const urlParams = new URLSearchParams(window.location.search)

        if (urlParams.has('category')) {
            const checkedCategories = urlParams.get('category').split(',')
            checkedCategories.forEach(c => {
                const checkbox = Array.from(categoryCheckboxes).find(ch => ch.id === c)
                if (checkbox) {
                    checkbox.checked = true
                }
            })
        }

        if (urlParams.has('rating')) {
            const ratingValue = urlParams.get('rating');
            const button = Array.from(ratingFilterButtons).find(btn => btn.dataset.rate === ratingValue);
            if (button) {
                button.classList.add('checked');
                lastCheckedRating = Array.from(ratingFilterButtons).indexOf(button);
                filters.rating = ratingValue;
            }
        }

        if (urlParams.has('min_price')) {
            minPriceInput.value = parseInt(urlParams.get('min_price'))
        }

        if (urlParams.has('max_price')) {
            maxPriceInput.value = parseInt(urlParams.get('max_price'))
        }
    }

    function setRatingFilter(button, index) {
        if (button.classList.contains('checked')) {
            button.classList.remove('checked')
            delete filters.rating
        } else {
        // Remove checked style class, if already exists
            if (!isNaN(lastCheckedRating)) {
                ratingFilterButtons[lastCheckedRating].classList.remove('checked')
            }
            button.classList.add('checked')
            lastCheckedRating = index
            filters.rating = button.dataset.rate ?? 1 // If data-rate fails, default to 1 to have bigger result list
        }
    }

    function applySearchFilter() {
        const checkedCategory = Array.from(categoryCheckboxes)
            .filter(ch => ch.checked)
            .map(ch => ch.value)
        const minPrice = minPriceInput.value
        const maxPrice = maxPriceInput.value

        if (checkedCategory.length > 0) {
            filters.category = checkedCategory;
        }
        if (minPrice) {
            filters.min_price = minPrice;
        }
        if (maxPrice) {
            filters.max_price = maxPrice;
        }

        const param = new URLSearchParams(filters)
        param.append('page', null)
        // Redirect with corresponding search filter query
        redirect.redirectToSearch(param, 1)
    }

    setFilterFromUrl() // Check filters on URL, then set them on search filter section

    ratingFilterButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            setRatingFilter(button, index)
        })
    })

    clearButton.addEventListener('click', e => {
        e.preventDefault()

        // Reset filter forms
        categoryFilterForm.reset()
        priceFilterForm.reset()

        filters = {}
    })

    applyButton.addEventListener('click', e => {
        e.preventDefault()

        applySearchFilter()
    })    
} catch (error) {
    dialog.errorOccurred(error.message)
}

