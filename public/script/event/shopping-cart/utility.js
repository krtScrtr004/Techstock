// TODO: Recalculate total price if user change quantity

import { dialog } from '../../render/dialog.js'

function domMembers() {
    const body = document.querySelector('body.shopping-cart')
    const form = body?.querySelector('.shopping-cart-form')

    const selectAll = form?.querySelector('#select_all')
    const tableContent = form?.querySelector('.table-content')
    const deleteItemButtons = form?.querySelectorAll('.delete-item-button')
    const removeCheckedButton = form?.querySelector('.remove-checked-button')
    const fieldsets = tableContent?.querySelectorAll('fieldset')

    return {
        body,
        form,
        selectAll,
        tableContent,
        deleteItemButtons,
        removeCheckedButton,
        fieldsets
    }
}

function formatNumber(number) {
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'decimal',
        maximumFractionDigits: 2
    })
    return formatter.format(number)
}

function getCheckedItems(dom) {
    const checkedItems =
        Array.from(dom.fieldsets)
            .flatMap(fieldset => { return Array.from(fieldset.querySelectorAll('.item-info input[type="checkbox"]:checked')) })
            .map(cb => cb.closest('.item-info'))

    return checkedItems
}


function calculateTotalPrice(dom) {
    let [totalPrice, itemCount] = [0, 0]

    const items = getCheckedItems(dom)
    items.forEach(item => {
        const price = item.querySelector('.total-price')

        // Remove currency symbols and commas, then parse as float
        const extract = price.textContent.replace(/[^0-9.]/g, '');
        totalPrice += parseFloat(extract) || 0;

        itemCount++
    })

    const paymentSummary = dom.form.querySelector('.payment-summary')
    paymentSummary.innerHTML = `
        <p class="payment-summary">Total Orders (${formatNumber(itemCount)}): <span class="bold-text blue-text">₱ ${formatNumber(totalPrice)}</span></p>
    `
}

export const shared = (() => {
    const dom = domMembers()
    return {
        ...dom,
        dialog,
        formatNumber: (number) => formatNumber(number),
        getCheckedItems: () => getCheckedItems(dom),
        calculateTotalPrice: () => calculateTotalPrice(dom)
    }
})()
