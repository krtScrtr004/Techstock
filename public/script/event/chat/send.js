// TODO: Use websocket for this

import { shared } from "./utility.js";

try {
    async function sendToBackend(formData) {
        try {
            const chatSessionId = shared.state.lastActiveChat?.getAttribute('data-id')

            const endpoint = `backend/send-message/${chatSessionId}` // TODO
            const response = await shared.http.POST(endpoint, formData, false)
            if (!response) {
                throw new Error('Message cannot be sent')
            }

            shared.message.value = ''
            shared.state.newestMessageDate = new Date().toISOString()

            return true
        } catch (error) {
            console.error(error)
            return null
        } finally {
            shared.state.selectedFiles.clear()
            shared.message.value = ''

            const mediaPreview = shared.writeMessageArea.querySelector('.media-preview')
            mediaPreview.innerHTML = ''
            if (mediaPreview?.classList.contains('flex-row')) {
                mediaPreview.classList.remove('flex-row')
                mediaPreview.classList.add('no-display')
            }
        }
    }

    shared.submitButton.addEventListener('click', async e => {
        e.preventDefault()

        if (shared.message.value === '' && shared.state.selectedFiles.size < 1) {
            shared.message.focus()
            return
        }

        const buttonImage = shared.submitButton.querySelector('img')
        shared.loader.patch(buttonImage)

        const formData = new FormData()

        for (const entry of shared.state.selectedFiles.values()) {
            formData.append(
                entry.type.includes('image/')
                    ? 'image_upload[]'
                    : 'video_upload[]'
                , entry)
        }
        formData.append('message', shared.message.value)

        if (!(await sendToBackend(formData))) {
            shared.notification.error(
                'Message cannot be sent! Please try again.',
                3000,
                shared.chatContentHeading
            )
        }

        shared.loader.delete()
    })

    shared.writeMessageForm?.addEventListener('submit', e => {
        e.preventDefault()
        shared.submitButton.click()
    })
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}