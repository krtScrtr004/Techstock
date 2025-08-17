import { Http } from '../utility/http.js'

import { Dialog } from '../render/dialog.js'

try {
    if (!document.cookie.includes('locationPermission')) {
        const locationPermissionModalWrapper = document.querySelector('.location-permission-modal-wrapper')
        locationPermissionModalWrapper.style.display = 'flex'

        async function executeRequest(e, permission) {
            e.preventDefault()

            locationPermissionModalWrapper.style.display = 'none'
            await Http.POST('form-submit/location-permission', { permission: permission })
        }

        const rejectButton = locationPermissionModalWrapper.querySelector('.location-permission-modal .reject-button')
        rejectButton.addEventListener('click', e => executeRequest(e, false))


        const allowButton = locationPermissionModalWrapper.querySelector('.location-permission-modal .allow-button')
        allowButton.addEventListener('click', e => executeRequest(e, true))
    }
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}
