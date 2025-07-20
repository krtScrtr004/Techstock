<?php

enum ReportReason: string
{
    case pbi = 'Prohibited (Banned) Items';
    case cnc = 'Counterfeit and Copyright';
    case opoi = 'Offensive or Potentially Offensive Items';
    case dtot = 'Directing Transaction Outside Techstock';
    case ob = 'Order Brushing';
    case lpv = 'Listing Policy Violation';
    case fl = 'Fraudulent Listings';
    case others = 'Others';
}

function reportReasonModal()
{
?>
    <!-- Report Reason Modal -->
    <!-- Modal Wrapper -->
    <section class="report-reason-modal-wrapper modal-wrapper">
        <!-- Modal -->
        <section class="report-reason-modal modal white-bg">
            <!-- Heading -->
            <section class="heading flex-row flex-space-between flex-child-center-h">
                <h3 class="black-text">Select A Reason</h3>

                <button class="close-button unset-button" title="Close">
                    <p class="black-text">&#x2715;</p>
                </button>
            </section>

            <section class="reasons">
                <form action="" method="POST">
                    <ul>
                        <?php 
                        foreach (ReportReason::cases() as $reason): 
                            $value = $reason->value;
                        ?>
                            <li>
                                <button 
                                    class="reason-button unset-button" 
                                    type="button" 
                                    value="<?= $value ?>">
                                    <?= $value ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </form>
            </section>
        </section>
    </section>
<?php
}

function reportDescriptionModal(): void
{
?>
    <!-- Report Description -->
    <!-- Modal Wrapper -->
    <section class="report-description-modal-wrapper modal-wrapper">
        <!-- Modal -->
        <section class="report-description-modal modal white-bg">
            <!-- Heading -->
            <section class="heading flex-row flex-space-between flex-child-center-h">
                <div class="header-w-back">
                    <button class="back-button unset-button">
                        <img src="<?= ICON_PATH . 'back.svg' ?>" alt="Back" title="Back" height="24">
                    </button>

                    <h3 class="reason-name black-text">Reason Name Here</h3>
                </div>

                <button class="close-button unset-button" title="Close">
                    <p class="black-text">&#x2715;</p>
                </button>
            </section>

            <!-- Main -->
            <section class="main flex-col">
                <label class="block black-text" for="report_description">Report Description <span class="red-text">*</span></label>

                <textarea class="report-description black-text" name="report_description" id="report_description" placeholder="Describe your report in 200 - 300 words" minlength="1" maxlength="300" required></textarea>

                <div>
                    <button class="submit-button float-right black-bg white-text">SUBMIT</button>
                </div>
            </section>
        </section>
    </section>
<?php
}
