import { shared } from "./utility.js"

try {
    function updateSelectAllState() {
        const allFieldsetsChecked = [...shared.fieldsets].every(fieldset => {
            const fieldCheckbox = fieldset.querySelector(`input[type="checkbox"]#${fieldset.name}`)
            return fieldCheckbox.checked
        })
        shared.selectAll.checked = allFieldsetsChecked
    }

    shared.fieldsets.forEach(fieldset => {
        const fieldCheckbox = fieldset.querySelector(`input[type="checkbox"]#${fieldset.name}`)
        const itemCheckboxes = fieldset.querySelectorAll('.item-info input[type="checkbox"]')

        // When fieldset checkbox changes, update its children and check "select all"
        fieldCheckbox.addEventListener('change', () => {
            itemCheckboxes.forEach(cb => {
                cb.checked = fieldCheckbox.checked
            })

            // Update select all if any fieldset checkbox is unchecked
            updateSelectAllState()
            shared.calculateTotalPrice()

        })

        // When any item is manually changed
        itemCheckboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                const allItemsChecked = [...itemCheckboxes].every(box => box.checked)
                fieldCheckbox.checked = allItemsChecked

                updateSelectAllState()
                shared.calculateTotalPrice()
            })
        })
    })

    // Select all toggles every fieldset and item
    shared.selectAll.addEventListener('change', () => {
        shared.fieldsets.forEach(fieldset => {
            const fieldCheckbox = fieldset.querySelector(`input[type="checkbox"]#${fieldset.name}`)
            const itemCheckboxes = fieldset.querySelectorAll('.item-info input[type="checkbox"]')

            fieldCheckbox.checked = shared.selectAll.checked
            itemCheckboxes.forEach(cb => {
                cb.checked = shared.selectAll.checked
            })
        })
        shared.calculateTotalPrice()
    })
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}
