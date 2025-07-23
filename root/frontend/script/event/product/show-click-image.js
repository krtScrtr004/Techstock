import { dialog } from '../../render/dialog.js'

try {
    const imagesSection = document.querySelector('.images-section')
    if (imagesSection) {
        const featuredImage = imagesSection.querySelector('.featured-image')
        const imageCollection = imagesSection.querySelectorAll('.image-collection > .carousel > img')

        imageCollection.forEach(image => {
            image.addEventListener('click', e => {
                e.stopPropagation()

                featuredImage.src = image.src
            })
        })    
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}

