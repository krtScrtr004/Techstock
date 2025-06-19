(() => {
    const modalWrappers = document.querySelectorAll('.modal-wrapper')
    modalWrappers.forEach(modalWrapper => {
        modalWrapper.addEventListener('click', e => {
            e.stopPropagation()
            if (e.target === modalWrapper && modalWrapper.style.display !== 'none') {
                modalWrapper.style.display = 'none'
            }
        })

        modalWrapper.querySelector('button').addEventListener('click', e => {
            e.preventDefault()
            if (modalWrapper.style.display !== 'none') {
                modalWrapper.style.display = 'none'
            }
        })

    })
})()
