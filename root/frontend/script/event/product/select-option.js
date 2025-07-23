import { dialog } from '../../render/dialog.js'

try {
    const [white, blue, black] = ['#fffefe', '#02a9f7', '#01303f']

    const optionForms = document.querySelectorAll('.option-form')

    function updateButtonStyle(status, button) {
        button.style.backgroundColor = (status) ? blue : white
        button.style.border = (status) ? `1px solid ${blue}` : `1px solid ${black}`
        button.style.color = (status) ? `${white}` : `${black}`
    }

    optionForms.forEach(form => {
        const hiddenWrappers = form.querySelectorAll('.hidden-wrapper')
        let lastCheckedButton = null
        hiddenWrappers.forEach(wrapper => {
            const radio = wrapper.querySelector('input[type="radio"]')
            const button = wrapper.querySelector('button')

            button.addEventListener('click', e => {
                e.preventDefault()

                // Remove style on the last checked radio / button 
                if (lastCheckedButton && lastCheckedButton !== button) {
                    updateButtonStyle(false, lastCheckedButton)
                }

                // Check / Uncheck radio on button click
                radio.checked = (radio.checked) ? false : true
                // Update style on check
                updateButtonStyle(radio.checked, button)

                lastCheckedButton = button
            })
        })
    })
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}

