import { hideModal } from '../../utility/hide-modal.js'

import { dialog } from '../../render/dialog.js'

try {
    const reportReasonModalWrapper = document.querySelector('.report-reason-modal-wrapper')
    if (reportReasonModalWrapper) {
        const reportDescriptionModalWrapper = document.querySelector('.report-description-modal-wrapper')

        function toggleModalWrapper(modalWrapper, status) {
            modalWrapper.style.display = (status) ? 'flex' : 'none'
        }

        const reportButton = document.querySelector('.report-button')
        reportButton.addEventListener('click', e => {
            e.preventDefault()
            toggleModalWrapper(reportReasonModalWrapper, true)
        })

        const reasonButtons = reportReasonModalWrapper.querySelectorAll('.reason-button')
        reasonButtons.forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault()

                const reportReason = button.value
                if (!reportReason) {
                    return
                }
                toggleModalWrapper(reportReasonModalWrapper, false)

                toggleModalWrapper(reportDescriptionModalWrapper, true)
                const reasonName = reportDescriptionModalWrapper.querySelector('.reason-name')
                reasonName.textContent = reportReason

                const backButton = reportDescriptionModalWrapper.querySelector('.back-button')
                backButton.addEventListener('click', ev => {
                    ev.preventDefault()
                    toggleModalWrapper(reportDescriptionModalWrapper, false)
                    toggleModalWrapper(reportReasonModalWrapper, true)
                })
            })
        })

        hideModal(reportDescriptionModalWrapper)
        hideModal(reportReasonModalWrapper)
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}   

