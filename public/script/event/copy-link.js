import { Dialog } from '../render/dialog.js'
import { Notification } from '../render/notification.js'

try {
    const copyLink = document.querySelector('.copy-link')
    copyLink?.addEventListener('click', e => {
        e.preventDefault()
        const duration = 3000
        navigator.clipboard.writeText(window.location.href)
            .then(() => {
                Notification.success(
                    'Link copied successfully!',
                    duration
                )
            }).catch(() => {
                Notification.error(
                    'There was a problem copying link! Please try again later',
                    duration
                )
            })
    })
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}