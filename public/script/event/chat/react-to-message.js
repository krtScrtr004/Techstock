import { shared } from './utility.js';
const {
    messagesArea,
    Dialog
} = shared

try {
    messagesArea?.addEventListener('click', e => {
        const ICON_PATH = 'asset/image/icon/'

        const button = e.target.closest('.react-button')
        if (button) {
            const reactCount = button.parentElement.querySelector('p')
            const icon = button.querySelector('img')
            const isFilled = icon.src.includes('fill')

            icon.src = ICON_PATH + (isFilled ? "heart_empty.svg" : "heart_fill.svg")
            reactCount.textContent = parseInt(reactCount.textContent) + (isFilled ? -1 : 1)
        }
    })
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}