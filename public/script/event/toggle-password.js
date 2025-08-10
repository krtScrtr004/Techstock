import { debounce } from '../utility/debounce.js'
import { dialog } from '../render/dialog.js';

try {
    const inputs = document.querySelectorAll(
        '.password-toggle-wrapper > input[type="password"]',
        '.password-toggle-wrapper > input[type="text"]'
    )
    if (inputs) {
        const path = 'asset/image/icon/'

        debounce(() => {
            inputs.forEach((input) => {
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
                        icon.src = `${path}show.svg`
                    } else {
                        input.type = 'password'
                        icon.src = `${path}hide.svg`
                    }
                }
            })
        }, 200)
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error.message)
}
