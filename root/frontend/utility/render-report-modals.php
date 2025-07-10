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

                <button class="close-button unset-button">
                    <p class="black-text">&#x2715;</p>
                </button>
            </section>

            <section class="reasons">
                <form action="" method="POST">
                    <ul>
                        <?php foreach (ReportReason::cases() as $reason): ?>
                            <li>
                                <button class="reason-button unset-button" type="button" value="<?= $reason->value ?>"><?= $reason->value ?></button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </form>
            </section>
        </section>
    </section>
<?php
}
