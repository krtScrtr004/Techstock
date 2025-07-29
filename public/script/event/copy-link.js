import { dialog } from '../render/dialog.js';
import { notification } from '../render/notification.js';

try {
    const copyLink = document.querySelector('.copy-link')
    if (copyLink) {
        copyLink.addEventListener('click', e => {
            e.preventDefault()
            const duration = 3000
            navigator.clipboard.writeText(window.location.href)
                .then(() => {
                    notification.success(
                        'Link copied successfully!',
                        duration
                    )
                }).catch(() => {
                    notification.error(
                        'There was a problem copying link! Please try again later',
                        duration
                    )
                })
        })
    }
} catch (error) {
    dialog.errorOccurred(error.message)
}