import { shared } from './utility.js'
const {
    writeMessageArea,
    writeMessageForm,
    filePickerButtons,
    state,
    debounce,
    dialog
} = shared

try {
    if (writeMessageForm) {
        const mediaPreview = writeMessageArea.querySelector('.media-preview')

        function removeFile(id) {
            if (state.selectedFiles.get(id)) {
                state.selectedFiles.delete(id)

                // Hide media preview section 
                if (state.selectedFiles.size < 1) {
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
            image.loading = 'lazy'

            container.append(button, image)
            fragment.append(container)
            mediaPreview.appendChild(fragment)

            button.addEventListener('click', e => {
                e.preventDefault()
                container.remove()
                removeFile(id)
            })
        }

        async function generateVideoThumbnail(file) {
            try {
                const video = document.createElement('video')
                video.preload = 'metadata'
                video.muted = true
                video.src = URL.createObjectURL(file)

                // Wait for video to load data
                await new Promise(resolve => {
                    video.addEventListener('loadeddata', () => {
                        // Seek to 0.5 seconds for better chance of a visible frame
                        video.currentTime = 0.5
                        resolve()
                    }, { once: true })
                })

                // Wait for seek to complete
                await new Promise(resolve => {
                    video.addEventListener('seeked', () => {
                        resolve()
                    }, { once: true })
                })

                const canvas = document.createElement('canvas')
                canvas.width = video.videoWidth
                canvas.height = video.videoHeight

                const ctx = canvas.getContext('2d')
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height)

                return canvas.toDataURL('image/jpeg')
            } catch (error) {
                return 'asset/image/icon/thumbnail_b.svg'
            }
        }

        filePickerButtons.forEach(picker => {
            picker.addEventListener('click', debounce(e => {
                e.preventDefault()

                const hiddenInput = picker.parentElement.querySelector('input[type="file"]')
                hiddenInput.addEventListener('change', e => {
                    Array.from(hiddenInput.files).forEach(async file => {
                        // Only push if no duplicates
                        for (const entry of state.selectedFiles.values()) {
                            if (entry.name === file.name && entry.size === file.size) {
                                return
                            }
                        }

                        const id = crypto.randomUUID()
                        state.selectedFiles.set(id, file)

                        if (mediaPreview.classList.contains('no-display')) {
                            mediaPreview.classList.remove('no-display')
                            mediaPreview.classList.add('flex-row')
                        }

                        const fileURL = (file.type.includes('image/')) ? URL.createObjectURL(file) : await generateVideoThumbnail(file)
                        createMediaPreview(id, fileURL)
                    })
                }, { once: true }) // Prevents multiple event listeners
                hiddenInput.click()
            }, 300))
        })
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}