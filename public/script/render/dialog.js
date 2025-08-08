import { hideModal } from '../utility/hide-modal.js'

const ICON_PATH = 'asset/image/icon/'

function render(
    status,
    id,
    title,
    message,
    parent = document.querySelector('body')
) {
    const icons = ['confirm.svg', 'reject.svg']
    const statusIcon = status ? icons[0] : icons[1]

    const html = `
        <section id="${id}-wrapper" class="modal-wrapper flex-col">
            <section class="dialog white-bg flex-col">
                <img 
                    src="${ICON_PATH + statusIcon}" 
                    alt="Result icon" 
                    title="Result icon" 
                    height="69" 
                    width="69" />

                    <div>
                        <h1 class="center-text">${title}</h1>
                        <p class="center-text">${message}</p>
                    </div>

                <button class="okay-button ${status ? 'blue-bg' : 'red-bg'} white-text">OKAY</button>
            </section>
        </section>
        `

    parent.insertAdjacentHTML('afterbegin', html)

    const modalWrapper = document.querySelector(`#${id}-wrapper`)
    hideModal(modalWrapper)
}

export const dialog = (() => {
    return {
        errorOccurred: function (message) {
            render(
                false,
                'error-occurred-dialog',
                'Error Occurred',
                message
            )
        },

        changePassword: function (status) {
            if (status) {
                render(
                    status,
                    'change-password-success-dialog',
                    'Password Reset',
                    'Your password was changed successfully.'
                )
            } else {
                render(
                    status,
                    'change-password-error-dialog',
                    'Password Reset',
                    'There was a problem changing your password. Please try again.'
                )
            }
        },

        reportResult: function (status) {
            if (status) {
                render(
                    status,
                    'report-result',
                    'Report Success',
                    'Your report was submitted successfully.'
                )
            } else {
                render(
                    status,
                    'report-result',
                    'Report Failed',
                    'There was a problem submitting your report. Please try again later.'
                )
            }
        },

        tooManyAttempt: function () {
            render(
                false,
                'too-many-attempt-dialog',
                'Too Many Attempt',
                'Access temporarily locked due to multiple failed attempts. Try again in 2 minutes.'
            )
        }
    }
})()
