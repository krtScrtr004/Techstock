<?php

function locationPermissionModal(): void
{
?>
    <section class="location-permission-modal-wrapper modal-wrapper">
        <section class="location-permission-modal dialog white-bg">
            <img
                src="<?= ICON_PATH . 'locate_bl.svg' ?>"
                alt="Location consent"
                title="Location consent"
                height="69"
                width="69" />

            <h1 class="center-text black-text">Location Request</h1>
            <div class="">
                <p class="description start-text black-text">
                    Techstock asks you for location permission for the following reasons:
                </p>

                <ul class="reasons-list">
                    <li class="black-text">Product Recommendation</li>
                    <li class="black-text">Currency Conversion</li>
                    <li class="black-text">Auto-complete Address</li>
                    <li class="black-text">etc.</li>
                </ul>
            </div>

            <div class="buttons flex-row">
                <button
                    class="reject-button red-bg white-text"
                    name="reject_button"
                    type="submit">
                    REJECT
                </button>

                <button 
                    class="allow-button blue-bg white-text" 
                    name="allow_button" 
                    type="submit">
                    ALLOW
                </button>
            </div>
        </section>
    </section>
<?php
}
