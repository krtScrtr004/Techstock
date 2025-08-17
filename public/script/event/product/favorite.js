import { shared } from './utility.js'
const {
    miscSection,
    Dialog
} = shared

try {
    const ICON_PATH = 'asset/image/icon/'

    const favoriteButton = miscSection?.querySelector('.favorite-button')
    favoriteButton?.addEventListener('click', e => {
        e.preventDefault()

        const icon = favoriteButton.querySelector('img')
        const regex = /empty/g
        icon.src = ICON_PATH + (regex.test(icon.src) ? 'heart_fill.svg' : 'heart_empty.svg')
    })
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}

