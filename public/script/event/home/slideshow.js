import { viewImage } from '../../utility/view-image.js';

import { Dialog } from '../../render/dialog.js';

try {
    const slideshowImageWrapper = document.querySelector('.slide-show-wrapper')
    if (slideshowImageWrapper) {
        const slideshowImage = slideshowImageWrapper.querySelector('.slide-show')
        const changeButtons = slideshowImageWrapper.querySelectorAll('.change-button')
        const dotTabs = slideshowImageWrapper.querySelectorAll('.dot-tab')

        const IMAGE_PATH = 'asset/image/'
        const images = [
            'console-1.jpg',
            'controller-1.jpg',
            'laptop-1.jpg',
            'laptop-2.jpg',
            'mouse-1.jpg'
        ]

        let imageIndex = 0
        let slideshowInterval = null

        function reflowImage() {
            slideshowImage.classList.remove('fade');
            void slideshowImage.offsetWidth; // force reflow
            slideshowImage.classList.add('fade');
        }

        function autoNextImage() {
            clearInterval(slideshowInterval)
            slideshowInterval = setInterval(() => {
                dotTabs[imageIndex].classList.remove('active')
                imageIndex = (imageIndex === 4) ? 0 : imageIndex + 1
                dotTabs[imageIndex].classList.add('active')

                reflowImage()
                slideshowImage.src = `${IMAGE_PATH}${images[imageIndex]}`
            }, 8000);
        }
        autoNextImage()

        changeButtons.forEach(button => {
            button.addEventListener('click', e => {
                e.stopPropagation()

                autoNextImage()

                dotTabs[imageIndex].classList.remove('active')
                if (button.classList.contains('next')) {
                    imageIndex = (imageIndex === 4) ? 0 : imageIndex + 1
                } else {
                    imageIndex = (imageIndex === 0) ? 4 : imageIndex - 1
                }
                dotTabs[imageIndex].classList.add('active')

                reflowImage()
                slideshowImage.src = `${IMAGE_PATH}${images[imageIndex]}`
            })
        })

        dotTabs.forEach((tab, index) => {
            tab.addEventListener('click', e => {
                e.stopPropagation()

                autoNextImage()

                dotTabs[imageIndex].classList.remove('active')
                imageIndex = index
                tab.classList.add('active')

                reflowImage()
                slideshowImage.src = `${IMAGE_PATH}${images[index]}`
            })
        })

        viewImage(slideshowImage)
    }
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}
