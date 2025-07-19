import { likeRating } from '../../utility/like-rating.js'
import { debounce } from '../../utility/debounce.js'
import { http } from '../../utility/http.js'

import { loader } from '../../render/loader.js'

const ratingListWrapper = document.querySelector('.rating-list-wrapper')
const hiddenWrappers = ratingListWrapper.querySelectorAll('.star-filter-buttons > form > .hidden-wrapper')

function updateButtonStyle(status, button) {
    if (status) {
        button.classList.add('active');
    } else {
        button.classList.remove('active');
    }
}

async function updateRatingList(/*ratingLevels*/) {
    const ratingList = ratingListWrapper.querySelector('.rating-list > .list')
    ratingList.innerHTML = '' // Remove all contents

    loader.full(ratingList)

    // const searchQuery = new URLSearchParams({
    //     'rating-level': ratingLevels
    // })

    // const endpoint = `dump/api/rating-card?${searchQuery.toString()}`
    const response = await http.GET('dump/api/rating-card') // TODO
    if (response) {
        response.ratingCards.forEach(html => {
            ratingList.insertAdjacentHTML('beforeend', html);
        })
        likeRating() // Add like rating event
    }

    loader.delete()
}

const firstHiddenWrapper = ratingListWrapper.querySelector('.hidden-wrapper:first-child')

const checkedFilters = [firstHiddenWrapper]
hiddenWrappers.forEach(wrapper => {
    const checkbox = wrapper.querySelector('input[type="checkbox"]')
    const button = wrapper.querySelector('button')

    debounce(
        button.addEventListener('click', e => {
            e.preventDefault()

            const ratingValue = checkbox.value

            // Helper function to uncheck a wrapper and update its style
            const uncheckWrapper = (targetWrapper) => {
                const targetCheckbox = targetWrapper.querySelector('input[type="checkbox"]')
                const targetButton = targetWrapper.querySelector('button')
                targetCheckbox.checked = false
                updateButtonStyle(false, targetButton)
            }

            // Handle "all" filter
            if (ratingValue === 'all') {
                checkedFilters.forEach(uncheckWrapper)
                checkedFilters.length = 0 // Clear the array
            } else {
                // Deselect the "all" option if it was selected
                const allWrapper = ratingListWrapper.querySelector('.hidden-wrapper:first-child')
                const allIndex = checkedFilters.indexOf(allWrapper)

                if (allIndex !== -1) {
                    uncheckWrapper(allWrapper)
                    checkedFilters.splice(allIndex, 1)
                }
            }

            // Toggle current filter
            const currentIndex = checkedFilters.indexOf(wrapper)
            const isSelected = currentIndex === -1

            checkbox.checked = isSelected;
            updateButtonStyle(isSelected, button)

            if (isSelected) {
                checkedFilters.push(wrapper)
            } else {
                checkedFilters.splice(currentIndex, 1)
            }

            // Update visible product list or filters
            updateRatingList(
                checkedFilters.map(filter =>
                    filter.querySelector('input[type="checkbox"]').value
                )
            )

            // Default to "all" option if there is no other options selected
            if (checkedFilters.length === 0) {
                checkedFilters.push(firstHiddenWrapper)
                updateButtonStyle(true, firstHiddenWrapper.querySelector('button'))
            }
        })
    )
})
