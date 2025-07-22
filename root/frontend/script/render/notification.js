import { stickToTop } from '../utility/stick-to-top.js'

const Notification = () => {
    function remove(notificationWrapper, notificationContent, duration) {
        // Define the handler outside the setTimeout to prevent undefined behaviors 
        // When copy-link button is clicked multiple successively
        function onAnimationEnd(ev) {
            if (ev.animationName === 'slide-up') {
                notificationContent.removeEventListener('animationend', onAnimationEnd)
                notificationWrapper.remove()
            }
        }

        // Clear previous animation classes
        notificationContent.classList.remove('slide-up')
        notificationContent.classList.add('slide-down')

        setTimeout(() => {
            notificationContent.classList.remove('slide-down')
            notificationContent.classList.add('slide-up')

            // Remove existing listeners (optional safety) and add again
            notificationContent.removeEventListener('animationend', onAnimationEnd)
            notificationContent.addEventListener('animationend', onAnimationEnd)
        }, duration)
    }

    function render(
        status,
        message,
        duration,
        parentElem = document.querySelector('header')
    ) {
        const statusStyle = status ? 'success' : 'error'

        const html = `
        <section class="notification-wrapper center-child block absolute ${statusStyle}">
            <div class="blue-bg">
                <p class="white-text">${message}</p>
            </div>
        </section>
        `

        parentElem.insertAdjacentHTML('afterend', html)

        const notificationWrapper = document.querySelector('.notification-wrapper')
        const notificationContent = notificationWrapper.querySelector('div')

        stickToTop(notificationWrapper)
        remove(
            notificationWrapper,
            notificationContent, 
            duration
        )
    }

    return {
        success: function (message, duration) {
            render(
                true,
                message,
                duration
            )
        },

        error: function (message, duration) {
            render(
                false,
                message,
                duration
            )
        }
    }
}
export const notification = Notification()