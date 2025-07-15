import { http } from '../utility/http.js'

if (!document.cookie.includes('locationPermission')) {
    const locationPermissionModalWrapper = document.querySelector('.location-permission-modal-wrapper')
    locationPermissionModalWrapper.style.display = 'flex'

    const rejectButton = locationPermissionModalWrapper.querySelector('.location-permission-modal .reject-button')
    rejectButton.addEventListener('click', async e => {
        e.preventDefault()

        await http.POST('form-submit/location-permission', { permission: false })
        locationPermissionModalWrapper.style.display = 'none'
    })


    const allowButton = locationPermissionModalWrapper.querySelector('.location-permission-modal .allow-button')
    allowButton.addEventListener('click', async e => {
        e.preventDefault()

        await http.POST('form-submit/location-permission', { permission: true })
        locationPermissionModalWrapper.style.display = 'none'
    })
}

