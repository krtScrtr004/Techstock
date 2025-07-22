import { dialog } from '../render/dialog.js'

try {
    const viewableImage = document.querySelectorAll('.viewable-image')    
    if (viewableImage) {
        viewableImage.forEach(image => {
            image.addEventListener('click', e => {
                e.stopPropagation()

                const imageSource = image.src
                const html = `
                <section class="view-image-wrapper center-child fixed transparent-bg">
                    <img
                        src="${imageSource}"
                        class="fit-contain relative"
                        loading="lazy"
                        height="350"
                        width="300" />
                </section>`

                const body = document.querySelector('body')
                body.insertAdjacentHTML('afterbegin', html)

                const wrapper = body.querySelector('.view-image-wrapper')
                wrapper.addEventListener('click', ev => {
                    ev.stopPropagation()

                    if (ev.target === wrapper) {
                        wrapper.remove()
                    }
                })
            })
        })
    }
} catch (error) {
    dialog.errorOccurred(error.message)
}

