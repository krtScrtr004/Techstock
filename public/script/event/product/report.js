import { shared } from './utility.js'
const {
    reportButton,
    reportReasonModalWrapper,
    reportDescriptionModalWrapper,
    reasonButtons,
    hideModal,
    Dialog
} = shared

try {
    if (reportReasonModalWrapper && reportDescriptionModalWrapper) {
        function toggleModalWrapper(modalWrapper, status) {
            modalWrapper.style.display = (status) ? 'flex' : 'none'
        }

        reportButton?.addEventListener('click', e => {
            e.preventDefault()
            toggleModalWrapper(reportReasonModalWrapper, true)
        })

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

                // TODO: Send to backend
            })
        })

        hideModal(reportDescriptionModalWrapper)
        hideModal(reportReasonModalWrapper)
    }
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}   

