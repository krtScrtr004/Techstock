import { Dialog } from '../render/dialog.js';

try {
    const ICON_PATH = 'asset/image/icon/'

    const inputs = document.querySelectorAll(
        '.password-toggle-wrapper > input[type="password"]',
        '.password-toggle-wrapper > input[type="text"]'
    )

    function togglePassword(input) {
        const icon = input.parentElement.querySelector(
            '.password-toggle-wrapper > img'
        )

        function displayIcon() {
            icon.style.display = 'inline-block';
        }
        function hideIcon() {
            icon.style.display = 'none';
        }

        input.addEventListener('click', displayIcon)
        input.addEventListener('mouseover', displayIcon)
        input.addEventListener('mouseout', hideIcon)

        icon.addEventListener('mouseover', displayIcon)
        icon.addEventListener('mouseout', hideIcon)

        icon.onclick = (e) => {
            e.stopPropagation()
            if (input.type === 'password') {
                input.type = 'text'
                icon.src = `${ICON_PATH}show.svg`
            } else {
                input.type = 'password'
                icon.src = `${ICON_PATH}hide.svg`
            }
        }
    }
    inputs.forEach(input => togglePassword(input))
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error.message)
}
