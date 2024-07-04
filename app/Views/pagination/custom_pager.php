<?php $pager->setSurroundCount(2) ?>

<ul class="pagination">
    <?php if ($pager->hasPrevious()) : ?>
        <li class="page-item">
            <a href="<?= $pager->getFirst() ?>" class="page-link" aria-label="First">
                <span aria-hidden="true">First</span>
            </a>
        </li>
        <li class="page-item">
            <a href="<?= $pager->getPrevious() ?>" class="page-link" aria-label="Previous">
                <span aria-hidden="true">Previous</span>
            </a>
        </li>
    <?php endif ?>

    <?php if ($pager->hasNext()) : ?>
        <li class="page-item">
            <a href="<?= $pager->getNext() ?>" class="page-link" aria-label="Next">
                <span aria-hidden="true">Next</span>
            </a>
        </li>
        <li class="page-item">
            <a href="<?= $pager->getLast() ?>" class="page-link" aria-label="Last">
                <span aria-hidden="true">Last</span>
            </a>
        </li>
    <?php endif ?>
</ul>
