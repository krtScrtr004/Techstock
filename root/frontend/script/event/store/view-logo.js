import { viewImage } from '../../utility/view-image.js';

import { dialog } from '../../render/dialog.js';

try {
    const storeLogo = document.querySelector('.store-logo')
    if (storeLogo) {
        viewImage(storeLogo)
    }
} catch (error) {
    dialog.errorOccurred(error.message)
    console.error(error)
}