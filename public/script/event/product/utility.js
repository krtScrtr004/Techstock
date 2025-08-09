import { dialog } from '../../render/dialog.js'
import { loader } from '../../render/loader.js'
import { notification } from '../../render/notification.js'

import { hideModal } from '../../utility/hide-modal.js'
import { displayPagination } from '../../utility/display-pagination.js'
import { viewImage } from '../../utility/view-image.js'

import { debounce } from '../../utility/debounce.js'
import { http } from '../../utility/http.js'

function domMembers() {
    const wrapper = document.querySelector('body.page-info')
    const purchaseInfo = wrapper?.querySelector('.purchase-info')
    const imagesSection = purchaseInfo?.querySelector('.images-section')
    const infoSection = purchaseInfo?.querySelector('.info-section')
    const miscSection = purchaseInfo?.querySelector('.misc-section')

    const optionSection = infoSection?.querySelectorAll('.option-section') || []
    const optionForms = [...optionSection].reduce((acc, section) => {
        acc.push(...section.querySelectorAll('.option-form'))
        return acc
    }, [])

    const ratings = wrapper.querySelector('#ratings')
    const ratingsHeading = ratings?.querySelector('.heading')
    const starFilterButtons = ratingsHeading?.querySelectorAll('.star-filter-buttons')

    const ratingList = ratings?.querySelector('.rating-list > .list')
    const ratingImages = ratings?.querySelectorAll('.rating-image') || []

    const reportButton = infoSection?.querySelector('.report-button')
    const reportReasonModalWrapper = document.querySelector('.report-reason-modal-wrapper')
    const reportDescriptionModalWrapper = document.querySelector('.report-description-modal-wrapper')
    const reasonButtons = reportReasonModalWrapper?.querySelectorAll('.reason-button') || []

    return {
        imagesSection, infoSection, optionSection,
        miscSection, optionForms, ratings, ratingsHeading,
        starFilterButtons, ratingList, ratingImages, reportButton,
        reportReasonModalWrapper, reportDescriptionModalWrapper,
        reasonButtons
    }
}

function likeRating(dom) {
    const PATH = 'asset/image/icon/'

    const likeRatingButtons = dom.ratings?.querySelectorAll('button.like-rating')
    likeRatingButtons?.forEach(button => {
        button.addEventListener('click', e => {
            e.preventDefault()

            const likeCount = button.parentElement.querySelector('p')

            const icon = button.querySelector('img')
            const regex = /dw/g
            if (regex.test(icon.src)) {
                icon.src = PATH + 'like_bl.svg'
                likeCount.textContent = parseInt(likeCount.textContent) + 1
            } else {
                icon.src = PATH + 'like_dw.svg'
                likeCount.textContent = parseInt(likeCount.textContent) - 1
            }
        })
    })
}

function displayRatings(cards, dom) {
    if (!cards) {
        throw new Error('No rating cards to be displayed')
    }
    cards.forEach(card => {
        dom.ratingList.insertAdjacentHTML('afterbegin', card)
    })
}

export const shared = (() => {
    const dom = domMembers()

    return {
        ...dom,
        dialog,
        loader,
        http,
        debounce,
        notification,
        hideModal,
        displayPagination,
        viewImage,
        likeRating: () => likeRating(dom),
        displayRatings: (cards) => displayRatings(cards, dom)
    }
})()