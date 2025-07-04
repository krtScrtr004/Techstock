const PATH = 'asset/image/icon/'

const favoriteButton = document.querySelector('button.favorite')
favoriteButton.addEventListener('click', e => {
    e.preventDefault()

    const icon = favoriteButton.querySelector('img')
    const regex = /empty/g
    icon.src = PATH + (regex.test(icon.src) ? 'heart_fill.svg' : 'heart_empty.svg')
})