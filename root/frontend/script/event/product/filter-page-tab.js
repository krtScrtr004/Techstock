import { displayPagination } from '../../utility/display-pagination.js'
import { likeRating } from '../../utility/like-rating.js'
import { viewImage } from '../../utility/view-image.js'
import { http } from '../../utility/http.js'

import { dialog } from '../../render/dialog.js'
import { loader } from '../../render/loader.js'

try {
    const maxPage = 10
    let pageNumber = 1

    const ratings = document.querySelector('#ratings')
    if (ratings) {
        const ratingList = ratings.querySelector('.rating-list > .list')

        document.addEventListener('DOMContentLoaded', likeRating())// Add like rating event

        function viewRatingImage() {
            const ratingImages = ratings.querySelectorAll('.rating-image')
            if (ratingImages) {
                ratingImages.forEach(image => viewImage(image))
            }

        }

        // function createSearchParam() {
        //     const checkedCheckboxes = ratings.querySelectorAll('input[type="checkbox"]:checked')

        //     const checkedFilters = Array.from(checkedCheckboxes).map(ch => ch.value)

        //     const searchParam = new URLSearchParams({
        //         'rating-level': checkedFilters
        //     })
        //     return searchParam.toString()
        // }

        async function redirectHandler(page) {
            // const endpoint = `dump/api/rating-card${createSearchParam()}`

            ratingList.innerHTML = '' // Remove all contents
            loader.full(ratingList)

            const response = await http.GET('dump/api/rating-card') // TODO
            if (response) {
                response.ratingCards.forEach(html => {
                    ratingList.insertAdjacentHTML('beforeend', html);
                })
                likeRating() // Add like rating event
            }

            ratings.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
                inline: 'nearest'
            });

            pageNumber = page
            displayPagination(pageNumber, maxPage, redirectHandler)

            loader.delete()

            viewRatingImage()
        }

        viewRatingImage() // For initial ratings listed
        displayPagination(pageNumber, maxPage, redirectHandler)
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}

