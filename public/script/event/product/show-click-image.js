import { shared } from './utility.js'
const {
    imagesSection,
    viewImage,
    dialog
} = shared

try {
    if (imagesSection) {
        const featuredImage = imagesSection.querySelector('.featured-image')
        const imageCollection = imagesSection.querySelectorAll('.image-collection > .carousel > img')

        imageCollection?.forEach(image => {
            image.addEventListener('click', e => {
                e.stopPropagation()

                featuredImage.src = image.src
            })
        })    
        viewImage(featuredImage)
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}

