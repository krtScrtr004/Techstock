import { shared } from './utility.js'

try {
    function removeItemDom(elem) {
        const fieldset = elem.closest('fieldset')
        const itemInfoParent = elem.closest('.item-info')
        itemInfoParent?.remove()

        // Remove store info when no items listed
        const remainingItems = fieldset.querySelectorAll('.item-info input[type="checkbox"]')
        if (remainingItems?.length < 1) {
            fieldset?.remove()
        }

        shared.calculateTotalPrice()
    }

    // TODO: SEND ITEM ID BACK TO SERVER

    // Delete Action Button
    if (shared.deleteItemButtons?.length > 0) {
        shared.deleteItemButtons.forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault()
                removeItemDom(button)
            })
        })
    }

    // Multiple Delete
    shared.removeCheckedButton?.addEventListener('click', e => {
        e.preventDefault()
        const checkedItems = shared.getCheckedItems()
        if (checkedItems.length > 0) {
            checkedItems.forEach(item => removeItemDom(item))
        }
    })
} catch (error) {
    shared.dialog.errorOccurred(error.message)
    console.error(error)
}