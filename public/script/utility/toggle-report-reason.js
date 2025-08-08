import { hideModal } from './hide-modal.js'

function toggleModalWrapper(modalWrapper, status) {
    modalWrapper.style.display = (status) ? 'flex' : 'none'
}

export function toggleReportReason(reportReasonModalWrapper, reportDescriptionModalWrapper) {
    if (!reportReasonModalWrapper || !reportDescriptionModalWrapper) {
        return
    }

    const reasonButtons = reportReasonModalWrapper.querySelectorAll('.reason-button')
    reasonButtons?.forEach(button => {
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

    const reportButton = document.querySelector('.report-button')
    reportButton?.addEventListener('click', e => {
        e.preventDefault()
        toggleModalWrapper(reportReasonModalWrapper, true)
    })


    hideModal(reportDescriptionModalWrapper)
    hideModal(reportReasonModalWrapper)
}