const EPSILON = 1 // Close to zero gap; Used to calculate right tracker scrollable area left

const carouselWrapper = document.querySelectorAll('.carousel-wrapper')

carouselWrapper.forEach(wrapper => {
    const carousel = wrapper.querySelector('.carousel')
    const trackers = wrapper.querySelectorAll('.tracker')
    
    const children = Array.from(carousel.children); 
    const visibleChildren = children.filter(child => {
        const containerRect = carousel.getBoundingClientRect()
        const childRect = child.getBoundingClientRect()

        // Check if child is within container's visible area
        return (
            childRect.left < containerRect.right &&
                    childRect.right > containerRect.left
        )
    })

    const style = window.getComputedStyle(carousel);
    const gap = parseInt(style.columnGap || style.gap) || 0;

    function hideTracker() {
        const left = Array.from(trackers).find(l => l.classList.contains('left'))
        const right = Array.from(trackers).find(r => r.classList.contains('right'))

        left.style.display = (carousel.scrollLeft <= 0) ? 'none' : 'flex'
        const maxScroll = carousel.scrollWidth - carousel.clientWidth
        right.style.display = (carousel.scrollLeft >= maxScroll - EPSILON) ? 'none' : 'flex'
    }
    hideTracker()

    carousel.addEventListener('scroll', hideTracker);
    trackers.forEach(tracker => {
        tracker.addEventListener('click', e => {
            e.stopPropagation()

            const carouselChildLength = children[0].clientWidth + (gap * visibleChildren.length);
            if (tracker.classList.contains('right')) {
                carousel.scrollBy({ left: carouselChildLength, behavior: 'smooth' });
            } else {
                carousel.scrollBy({ left: (-carouselChildLength), behavior: 'smooth' });
            }
        })
    })
})