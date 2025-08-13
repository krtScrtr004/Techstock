import { shared } from './utility.js';
const {
    chatToggle,
    wrapper,
    debounce,
    dialog
} = shared

try {
    function open() {
        wrapper.classList.remove('close')
        wrapper.classList.add('show')
    }

    function close() {
        wrapper.classList.remove('show')
        setTimeout(() => {
            wrapper.classList.add('close')
        }, 300)
    }

    chatToggle?.addEventListener('click', open)

    wrapper.addEventListener('click', e => {
        const el = e.target
        if (el === wrapper) {
            close()
        }
    })
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}