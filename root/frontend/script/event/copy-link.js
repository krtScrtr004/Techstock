import { dialog } from '../render/dialog.js';

try {
    function animateNotification(notificationWrapper) {
        const notificationContent = notificationWrapper.querySelector('div');
        const duration = notificationContent.getAttribute('data-duration') ?? 5000;

        // Define the handler outside the setTimeout to prevent undefined behaviors 
        // When copy-link button is clicked multiple successively
        function onAnimationEnd(ev) {
            if (ev.animationName === 'slide-up') {
                notificationContent.removeEventListener('animationend', onAnimationEnd);
                notificationWrapper.style.display = 'none';
            }
        }

        // Clear previous animation classes
        notificationContent.classList.remove('slide-up');

        notificationWrapper.style.display = 'block';
        notificationContent.classList.add('slide-down');

        setTimeout(() => {
            notificationContent.classList.remove('slide-down');
            notificationContent.classList.add('slide-up');

            // Remove existing listeners (optional safety) and add again
            notificationContent.removeEventListener('animationend', onAnimationEnd);
            notificationContent.addEventListener('animationend', onAnimationEnd);
        }, duration);
    }


    const copyLink = document.querySelector('.copy-link')
    copyLink.addEventListener('click', e => {
        e.preventDefault()
        navigator.clipboard.writeText(window.location.href)
            .then(() => {
                animateNotification(document.querySelector('.notification-wrapper.success'))
            })
            .catch(() => {
                animateNotification(document.querySelector('.notification-wrapper.fail'))
            })
    })
} catch (error) {
    dialog.errorOccurred(error.message)
}