const path = 'asset/image/'

const images = [
    'console-1.jpg',
    'controller-1.jpg',
    'laptop-1.jpg',
    'laptop-2.jpg',
    'mouse-1.jpg'
]

let imageIndex = 0
let slideshowInterval = null;

const slideshowImageWrapper = document.querySelector('.slide-show-wrapper')
const slideshowImage = slideshowImageWrapper.querySelector('.slide-show')
const changeButtons = slideshowImageWrapper.querySelectorAll('.change-button')
const dotTabs = slideshowImageWrapper.querySelectorAll('.dot-tab')

const reflowImage = () => {
    slideshowImage.classList.remove('fade');
    void slideshowImage.offsetWidth; // force reflow
    slideshowImage.classList.add('fade');

}

const autoNextImage = () => {
    clearInterval(slideshowInterval)
    slideshowInterval = setInterval(() => {
        dotTabs[imageIndex].classList.remove('active')
        imageIndex = (imageIndex === 4) ? 0 : imageIndex + 1
        dotTabs[imageIndex].classList.add('active')

        reflowImage()
        slideshowImage.src = `${path}${images[imageIndex]}`
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
        slideshowImage.src = `${path}${images[imageIndex]}`
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
        slideshowImage.src = `${path}${images[index]}`
    })
})
