const PATH = 'asset/image/icon/'

export function likeRating () {
    const ratingListWrapper = document.querySelector('#ratings')
    const likeRatingButtons = ratingListWrapper.querySelectorAll('button.like-rating')
    likeRatingButtons.forEach(button => {
        button.addEventListener('click', e => {
            e.preventDefault()

            const icon = button.querySelector('img')
            const regex = /dw/g
            icon.src = PATH + (regex.test(icon.src) ? 'like_bl.svg' : 'like_dw.svg')
        })
    })
}

