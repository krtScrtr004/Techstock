import { shared } from './utility.js'

try {
    if (shared.writeMessageForm) {
        const mediaPreview = shared.writeMessageArea.querySelector('.media-preview')

        function removeFile(id) {
            if (shared.selectedFiles.get(id)) {
                shared.selectedFiles.delete(id)

                // Hide media preview section 
                if (shared.selectedFiles.size < 1) {
                    mediaPreview.classList.remove('flex-row')
                    mediaPreview.classList.add('no-display')
                }
            }
        }

        function createMediaPreview(id, src) {
            const fragment = document.createDocumentFragment()

            const container = document.createElement('div')
            container.classList.add('media-preview-container', 'relative')

            const button = document.createElement('button')
            button.classList.add('remove-media-button', 'unset-button')

            const p = document.createElement('p')
            p.classList.add(
                'center-child',
                'center-text',
                'red-text',
                'bold-text'
            )
            p.innerHTML = '&#10006'

            button.append(p)

            const image = document.createElement('img')
            image.src = src

            container.append(button, image)
            fragment.append(container)
            mediaPreview.appendChild(fragment)

            button.addEventListener('click', e => {
                e.preventDefault()
                container.remove()
                removeFile(id)
            })
        }

        shared.filePickerButtons.forEach(picker => {
            picker.addEventListener('click', e => {
                e.preventDefault()

                const hiddenInput = picker.parentElement.querySelector('input[type="file"]')
                hiddenInput.addEventListener('change', e => {
                    Array.from(hiddenInput.files).forEach(file => {
                        // Only push if no duplicates
                        for (const entry of shared.selectedFiles.values()) {
                            if (entry.name === file.name && entry.size === file.size) {
                                return
                            }
                        }

                        const id = crypto.randomUUID()
                        shared.selectedFiles.set(id, file)

                        if (mediaPreview.classList.contains('no-display')) {
                            mediaPreview.classList.add('flex-row')
                        }

                        if (file.type.startsWith('image/')) {
                            const fileURL = URL.createObjectURL(file)
                            createMediaPreview(id, fileURL)
                        }
                    })
                }, { once: true }) // Prevents multiple event listeners
                hiddenInput.click()
            })
        })
    }

    // TODO: Add video preview
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}