import { shared } from './utility.js'

export function messageFragmentCallback(message) {
    const {
        id,
        type,
        content,
        amISender,
        createdAt
    } = message;

    const flexDirection = amISender ? 'flex-row-reverse' : 'flex-row'
    const messageAlignment = amISender ? 'float-right' : 'float-left'
    const boxBackground = type === 'text' ? 'white-bg' : 'transparent-bg'

    const fragment = document.createDocumentFragment()

    // Outer container
    const row = document.createElement('div')
    row.className = `message-row ${flexDirection} relative`
    row.setAttribute('data-id', id)

    // Menu box
    const menu = document.createElement('div')
    menu.className = 'message-box-menu no-display white-bg absolute'

    if (amISender) {
        const deleteBtn = document.createElement('button')
        deleteBtn.className = 'delete-button unset-button'
        const deleteText = document.createElement('p')
        deleteText.className = 'black-text'
        deleteText.textContent = 'Delete'
        deleteBtn.appendChild(deleteText)
        menu.appendChild(deleteBtn)
    }

    const reportBtn = document.createElement('button')
    reportBtn.className = 'report-button unset-button'
    const reportText = document.createElement('p')
    reportText.className = 'black-text'
    reportText.textContent = 'Report'
    reportBtn.appendChild(reportText)
    menu.appendChild(reportBtn)

    // Message box
    const box = document.createElement('div')
    box.className = `message-box ${boxBackground} ${messageAlignment}`

    if (type === 'text') {
        const p = document.createElement('p')
        p.className = 'black-text'
        p.textContent = content
        box.appendChild(p)
    } else if (type === 'image') {
        const img = document.createElement('img')
        img.className = 'viewable-image'
        img.src = content
        img.alt = ''
        img.width = 300
        box.appendChild(img)
    } else if (type === 'video') {
        const video = document.createElement('video')
        video.controls = true
        const sourceMp4 = document.createElement('source')
        sourceMp4.src = content
        sourceMp4.type = 'video/mp4'
        const sourceWebm = document.createElement('source')
        sourceWebm.src = content
        sourceWebm.type = 'video/webm'
        video.appendChild(sourceMp4)
        video.appendChild(sourceWebm)
        video.append('Your browser does not support video player')
        box.appendChild(video)
    }

    // Date
    const dateSpan = document.createElement('span')
    dateSpan.className = 'block end-text'
    dateSpan.textContent = shared.simplifyDate(createdAt.date) 
    box.appendChild(dateSpan)

    // Reaction container
    const reactionContainer = document.createElement('div')
    reactionContainer.className = 'center-child flex-col'

    const reactButton = document.createElement('button')
    reactButton.className = 'react-button unset-button'
    const reactImg = document.createElement('img')
    reactImg.src = 'asset/image/icon/heart_empty.svg'
    reactImg.alt = 'Like'
    reactImg.title = 'Like'
    reactImg.height = 24
    reactButton.appendChild(reactImg)

    const reactionCount = document.createElement('p')
    reactionCount.className = 'reaction-count light-black-text'
    reactionCount.textContent = '0'

    reactionContainer.appendChild(reactButton)
    reactionContainer.appendChild(reactionCount)

    // Assemble
    row.appendChild(menu)
    row.appendChild(box)
    row.appendChild(reactionContainer)

    fragment.appendChild(row)
    return fragment
}