import { http } from '../utility/http.js'

if (!document.cookie.includes('locationPermission')) {
    const locationPermissionModalWrapper = document.querySelector('.location-permission-modal-wrapper')
    locationPermissionModalWrapper.style.display = 'flex'

    const rejectButton = locationPermissionModalWrapper.querySelector('.location-permission-modal .reject-button')
    rejectButton.addEventListener('click', e => {
        e.preventDefault()

        locationPermissionModalWrapper.style.display = 'none'
    })


    const allowButton = locationPermissionModalWrapper.querySelector('.location-permission-modal .allow-button')
    allowButton.addEventListener('click', async e => {
        e.preventDefault()

        await http.POST('form-submit/location-permission')
        locationPermissionModalWrapper.style.display = 'none'
    })
}

