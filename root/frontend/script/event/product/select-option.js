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
        let [lastCheckedOption, lastCheckedButton] = [null]
        hiddenWrappers.forEach(wrapper => {
            const checkbox = wrapper.querySelector('input[type="checkbox"]')
            const button = wrapper.querySelector('button')

            button.addEventListener('click', e => {
                e.preventDefault()

                // Remove style on the last checked checkbox / button 
                if (lastCheckedOption && lastCheckedOption !== checkbox) {
                    lastCheckedOption.checked = false
                    updateButtonStyle(false, lastCheckedButton)
                } 

                // Check / Uncheck checkbox on button click
                checkbox.checked = (checkbox.checked) ? false : true
                // Update style on check
                updateButtonStyle(checkbox.checked, button)

                lastCheckedOption = checkbox
                lastCheckedButton = button
            })
        })
    })    
} catch (error) {
    dialog.errorOccurred(error.message)
}

