import { viewImage } from '../../utility/view-image.js';

import { Dialog } from '../../render/dialog.js';

try {
    const storeLogo = document.querySelector('.store-logo')
    if (storeLogo) {
        viewImage(storeLogo)
    }
} catch (error) {
    Dialog.errorOccurred(error.message)
    console.error(error)
}