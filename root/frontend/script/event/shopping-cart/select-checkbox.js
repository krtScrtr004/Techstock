import { dialog } from '../../render/dialog.js'

try {
    const shoppingCartForm = document.querySelector('.shopping-cart-form')
    const tableContent = shoppingCartForm.querySelector('.table-content')

    const selectAll = shoppingCartForm.querySelector('#select_all')
    const fieldsets = tableContent.querySelectorAll('fieldset')

    function updateSelectAllState() {
        const allFieldsetsChecked = [...fieldsets].every(fieldset => {
            const fieldCheckbox = fieldset.querySelector(`input[type="checkbox"]#${fieldset.name}`)
            return fieldCheckbox.checked
        })
        selectAll.checked = allFieldsetsChecked
    }

    fieldsets.forEach(fieldset => {
        const fieldCheckbox = fieldset.querySelector(`input[type="checkbox"]#${fieldset.name}`)
        const itemCheckboxes = fieldset.querySelectorAll('.item-info input[type="checkbox"]')

        // When fieldset checkbox changes, update its children and check "select all"
        fieldCheckbox.addEventListener('change', () => {
            itemCheckboxes.forEach(cb => {
                cb.checked = fieldCheckbox.checked
            })

            // Update select all if any fieldset checkbox is unchecked
            updateSelectAllState()
        })

        // When any item is manually changed
        itemCheckboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                const allItemsChecked = [...itemCheckboxes].every(box => box.checked)
                fieldCheckbox.checked = allItemsChecked

                updateSelectAllState()
            })
        })
    })

    // Select all toggles every fieldset and item
    selectAll.addEventListener('change', () => {
        fieldsets.forEach(fieldset => {
            const fieldCheckbox = fieldset.querySelector(`input[type="checkbox"]#${fieldset.name}`)
            const itemCheckboxes = fieldset.querySelectorAll('.item-info input[type="checkbox"]')

            fieldCheckbox.checked = selectAll.checked
            itemCheckboxes.forEach(cb => {
                cb.checked = selectAll.checked
            })
        })
    })
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}
