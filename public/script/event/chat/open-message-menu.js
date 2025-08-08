import { shared } from './utility.js'

try {
    let lastOpenedMenu = null
    function updateLastOpenedMenu(newOpenedMenu) {
        // Hide last opened menu
        lastOpenedMenu?.classList.remove('flex-col')
        lastOpenedMenu?.classList.add('no-display')

        lastOpenedMenu = newOpenedMenu
    }

    function displayMenu(messageRow, messageBoxMenu, event) {
        const rect = messageRow.getBoundingClientRect();

        // Unset all positions to avoid conflicting styles
        messageBoxMenu.style.left = '';
        messageBoxMenu.style.right = '';
        messageBoxMenu.style.top = '';
        messageBoxMenu.style.bottom = '';

        // Position horizontally
        if (event.clientX + messageBoxMenu.offsetWidth > rect.right) {
            // Handle overflow on x-axis
            messageBoxMenu.style.right = (rect.right - event.clientX) + 'px';
        } else {
            messageBoxMenu.style.left = (event.clientX - rect.left) + 'px';
        }

        // Position vertically
        if (event.clientY + messageBoxMenu.offsetHeight > rect.bottom) {
            // Handle overflow on y-axis
            messageBoxMenu.style.bottom = (rect.bottom - event.clientY) + 'px';
        } else {
            messageBoxMenu.style.top = (event.clientY - rect.top) + 'px';
        }

        messageBoxMenu.classList.add('flex-col');
    }

    function toggleMenuEvents(messageBoxMenu) {
        const buttons = messageBoxMenu.querySelectorAll('button')
        buttons?.forEach(button => {
            button.addEventListener('click', e => {
                if (button.classList.contains('delete-button')) {
                    messageBoxMenu.parentElement.remove()
                } else if (button.classList.contains('report-button')) {
                    // TODO: Send to backend
                    if (true) {
                        shared.dialog.reportResult(true)
                    } else {
                        shared.dialog.reportResult(false)
                    }
                }
            }, { once: true })
        })
    }


    shared.messagesArea?.addEventListener('contextmenu', e => {
        e.preventDefault()

        const messageRow = e.target.closest('.message-row')
        if (messageRow) {
            const messageBoxMenu = messageRow.querySelector('.message-box-menu')
            updateLastOpenedMenu(messageBoxMenu)

            if (!messageBoxMenu?.classList.toggle('no-display')) {
                displayMenu(messageRow, messageBoxMenu, e)
            }

            toggleMenuEvents(messageBoxMenu)

            // Hide menu if clicked somewhere else
            document.addEventListener('click', e => {
                if (!messageBoxMenu.contains(e.target) && messageBoxMenu.classList.contains('flex-col')) {
                    messageBoxMenu.classList.remove('flex-col')
                    messageBoxMenu.classList.add('no-display')
                    document.removeEventListener('click', handler)
                }
            })
        }
    })
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}