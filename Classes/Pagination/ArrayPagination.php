<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension: custom_package.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Slavlee\CustomPackage\Pagination;

use TYPO3\CMS\Core\Pagination\SlidingWindowPagination;
use TYPO3\CMS\Core\Pagination\ArrayPaginator;

class ArrayPagination
{
    /**
     * @var ArrayPaginator
     */
    protected ArrayPaginator $paginator;

    /**
     * @var SlidingWindowPagination
     */
    protected SlidingWindowPagination $pagination;

    /**
     * Items to paginate through
     * @var array
     */
    protected array $items;

    public function __construct(
        array $items,
        int $currentPageNumber = 1,
        int $itemsPerPage = 10,
        int $maximumLinks = 15
    ) {
        $this->items = $items;
        $this->paginator = new ArrayPaginator($items, $currentPageNumber, $itemsPerPage);
        $this->pagination = new SlidingWindowPagination(
            $this->paginator,
            $maximumLinks
        );
    }

    /**
     * Return paginator and pagination in assoc
     * @return array
     */
    public function getPagination(): array
    {
        return [
            'pagination' => $this->pagination,
            'paginator' => $this->paginator
        ];
    }

    /**
     * Return total amount of items
     * @return int
     */
    public function getTotalAmountOfItems(): int
    {
        return \count($this->items);
    }
}
