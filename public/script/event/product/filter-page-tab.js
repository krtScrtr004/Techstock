import { shared } from './utility.js'
const {
    ratings,
    ratingList,
    likeRating,
    viewImage,
    displayRatings,
    displayPagination,
    Loader,
    Http,
    Dialog
} = shared


try {
    const maxPage = 10
    let pageNumber = 1

    if (ratingList) {
        document.addEventListener('DOMContentLoaded', likeRating()) // Add like rating event

        function viewRatingImage() {
            const ratingImages = ratings?.querySelectorAll('.rating-image')
            ratingImages?.forEach(image => viewImage(image))
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
            Loader.full(ratingList)

            const response = await Http?.GET('dump/api/rating-card') // TODO
            if (response) {
                displayRatings(response.ratingCards)
                likeRating() // Add like rating event
            }

            ratings.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
                inline: 'nearest'
            });

            pageNumber = page
            displayPagination(pageNumber, maxPage, redirectHandler)

            Loader.delete()

            viewRatingImage()
        }

        viewRatingImage() // For initial ratings listed
        displayPagination(pageNumber, maxPage, redirectHandler)
    }
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}

