// TODO: Use websocket for this

import { shared } from './utility.js'
const {
    writeMessageArea,
    writeMessageForm,
    message,
    submitButton,
    state,
    http,
    notification,
    loader,
    dialog
} = shared

try {
    async function sendToBackend(formData) {
        try {
            const chatSessionId = state.lastActiveChat?.getAttribute('data-id')

            const endpoint = `backend/send-message/${chatSessionId}` // TODO
            const response = await http.POST(endpoint, formData, false)
            if (!response) {
                throw new Error('Message cannot be sent')
            }

            message.value = ''
            state.newestMessageDate = new Date().toISOString()

            return true
        } catch (error) {
            console.error(error)
            return null
        } finally {
            state.selectedFiles.clear()
            message.value = ''

            const mediaPreview = writeMessageArea.querySelector('.media-preview')
            mediaPreview.innerHTML = ''
            if (mediaPreview?.classList.contains('flex-row')) {
                mediaPreview.classList.remove('flex-row')
                mediaPreview.classList.add('no-display')
            }
        }
    }

    submitButton.addEventListener('click', async e => {
        e.preventDefault()

        if (message.value === '' && state.selectedFiles.size < 1) {
            message.focus()
            return
        }

        const buttonImage = submitButton.querySelector('img')
        loader.patch(buttonImage)

        const formData = new FormData()

        for (const entry of state.selectedFiles.values()) {
            formData.append(
                entry.type.includes('image/')
                    ? 'image_upload[]'
                    : 'video_upload[]'
                , entry)
        }
        formData.append('message', message.value)

        if (!(await sendToBackend(formData))) {
            notification.error(
                'Message cannot be sent! Please try again.',
                3000,
                chatContentHeading
            )
        }

        loader.delete()
    })

    writeMessageForm?.addEventListener('submit', e => {
        e.preventDefault()
        submitButton.click()
    })
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}