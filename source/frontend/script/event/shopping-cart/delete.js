import { calculateTotalPrice } from '../../utility/calculate-total-price.js'

import { dialog } from '../../render/dialog.js'

try {
    const shoppingCartForm = document.querySelector('.shopping-cart-form')

    function getCheckedItems() {
        const fieldsets = shoppingCartForm.querySelectorAll('fieldset')
        const checkedItems =
        Array.from(fieldsets)
            .flatMap(fieldset => { return Array.from(fieldset.querySelectorAll('.item-info input[type="checkbox"]:checked')) })
            .map(cb => cb.closest('.item-info'))

        return checkedItems
    }

    function removeItemDom(elem) {
        const fieldset = elem.closest('fieldset')
        const itemInfoParent = elem.closest('.item-info')
        if (itemInfoParent) {
            itemInfoParent.remove()
        }

        // Remove store info when no items listed
        const remainingItems = fieldset.querySelectorAll('.item-info input[type="checkbox"]')
        if (remainingItems.length < 1) {
            fieldset.remove()
        }

        calculateTotalPrice()
    }

    // TODO: SEND ITEM ID BACK TO SERVER

    // Delete Action Button
    const deleteItemButtons = shoppingCartForm.querySelectorAll('.delete-item-button')
    if (deleteItemButtons.length > 0) {
        deleteItemButtons.forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault()
                removeItemDom(button)
            })
        })
    }

    // Multiple Delete
    const removeCheckedButton = shoppingCartForm.querySelector('.remove-checked-button')
    if (removeCheckedButton) {
        removeCheckedButton.addEventListener('click', e => {
            e.preventDefault()
            const checkedItems = getCheckedItems()
            if (checkedItems.length > 0) {
                checkedItems.forEach(item => removeItemDom(item))
            }
        })
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}