const PATH = 'asset/image/icon/'

export function likeRating() {
    const ratingListWrapper = document.querySelector('#ratings')
    const likeRatingButtons = ratingListWrapper.querySelectorAll('button.like-rating')
    likeRatingButtons.forEach(button => {
        button.addEventListener('click', e => {
            e.preventDefault()

            const likeCount = button.parentElement.querySelector('p')

            const icon = button.querySelector('img')
            const regex = /dw/g
            if (regex.test(icon.src)) {
                icon.src = PATH + 'like_bl.svg'
                likeCount.textContent = parseInt(likeCount.textContent) + 1
            } else {
                icon.src = PATH + 'like_dw.svg'
                likeCount.textContent = parseInt(likeCount.textContent) - 1
            }
        })
    })
}

