import { shared } from './utility.js'
const {
    miscSection,
    dialog
} = shared

try {
    const PATH = 'asset/image/icon/'

    const favoriteButton = miscSection?.querySelector('.favorite-button')
    favoriteButton?.addEventListener('click', e => {
        e.preventDefault()

        const icon = favoriteButton.querySelector('img')
        const regex = /empty/g
        icon.src = PATH + (regex.test(icon.src) ? 'heart_fill.svg' : 'heart_empty.svg')
    })
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}

