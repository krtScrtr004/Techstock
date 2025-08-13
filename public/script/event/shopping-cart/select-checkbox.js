import { shared } from './utility.js'
const {
    fieldsets,
    selectAll,
    calculateTotalPrice,
    Dialog
} = shared

function updateSelectAllState() {
    const allFieldsetsChecked = [...fieldsets].every(fieldset => {
        const fieldCheckbox = fieldset.querySelector(`input[type="checkbox"]#${fieldset.name}`)
        return fieldCheckbox.checked
    })
    selectAll.checked = allFieldsetsChecked
}

try {
    fieldsets?.forEach(fieldset => {
        const fieldCheckbox = fieldset.querySelector(`input[type="checkbox"]#${fieldset.name}`)
        const itemCheckboxes = fieldset.querySelectorAll('.item-info input[type="checkbox"]')

        // When fieldset checkbox changes, update its children and check "select all"
        fieldCheckbox?.addEventListener('change', () => {
            itemCheckboxes.forEach(cb => {
                cb.checked = fieldCheckbox.checked
            })

            // Update select all if any fieldset checkbox is unchecked
            updateSelectAllState()
            calculateTotalPrice()

        })

        // When any item is manually changed
        itemCheckboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                const allItemsChecked = [...itemCheckboxes].every(box => box.checked)
                fieldCheckbox.checked = allItemsChecked

                updateSelectAllState()
                calculateTotalPrice()
            })
        })
    })

    // Select all toggles every fieldset and item
    selectAll?.addEventListener('change', () => {
        fieldsets.forEach(fieldset => {
            const fieldCheckbox = fieldset.querySelector(`input[type="checkbox"]#${fieldset.name}`)
            const itemCheckboxes = fieldset.querySelectorAll('.item-info input[type="checkbox"]')

            fieldCheckbox.checked = selectAll.checked
            itemCheckboxes.forEach(cb => {
                cb.checked = selectAll.checked
            })
        })
        calculateTotalPrice()
    })
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}
