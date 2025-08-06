const Loader = () => {
    let parent;
    let patchedElem = null

    function render(parentElem, loaderHtml, position) {
        if (!parentElem) {
            return
        }
        parentElem.style.position = 'relative';
        parentElem.insertAdjacentHTML(position, loaderHtml);
        parent = parentElem;
    }

    return {
        full: function (parentElem) {
            const parentHeight = parentElem.offsetHeight;
            const loaderElem = `
                <div 
                    class="loader-wrapper center-child absolute white-bg" 
                    style="height:${parentHeight}; top:0; left:0; right:0; bottom:0;">
                        <span class="loader"></span>
                </div>`;
            render(parentElem, loaderElem, 'afterbegin');
        },

        lead: function (parentElem) {
            const loaderElem = `
                <div 
                    class="loader-wrapper center-child transparent-bg" 
                    style="height:fit-content; top:0;">
                        <span class="loader"></span>
                </div>`;
            render(parentElem, loaderElem, 'afterbegin');
        },

        trail: function (parentElem) {
            const loaderElem = `
                <div 
                    class="loader-wrapper center-child transparent-bg" 
                    style="height:fit-content; bottom:0;">
                        <span class="loader"></span>
                </div>`;
            render(parentElem, loaderElem, 'beforeend');
        },

        patch: function (elementToPatch) {
            patchedElem = {
                elem: elementToPatch,
                style: elementToPatch.style.display
            }
            const elemHeight = elementToPatch.clientHeight

            const loaderElem = `
                <div 
                    class="loader-wrapper center-child transparent-bg" 
                    style="height:fit-content;">
                        <span class="loader" style="height:${elemHeight}px; width:${elemHeight}px"></span>
                </div>`;

            elementToPatch.style.display = 'none'
            render(elementToPatch.parentElement, loaderElem, 'afterbegin');
        },

        delete: function () {
            const createdLoader = parent?.querySelector('.loader-wrapper');
            createdLoader?.remove();

            if (patchedElem) {
                patchedElem.elem.style.display = patchedElem.style
                patchedElem = null
            }
        }
    }
}
export const loader = Loader();
