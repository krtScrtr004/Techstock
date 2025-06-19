(() => {
    const backButtons = document.querySelectorAll('.back-button')
    if (!backButtons) {
        return
    }
    backButtons.forEach(button => {
        button.addEventListener('click', e => {
            e.stopPropagation()
            window.history.back()
        })
    })
})()