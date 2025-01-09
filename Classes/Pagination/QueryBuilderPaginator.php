<?php

declare(strict_types=1);

/*
 * This file is part of the "news" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Slavlee\CustomPackage\Pagination;

use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Pagination\AbstractPaginator;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

final class QueryBuilderPaginator extends CustomAbstractPaginator
{
    /**
     * @var QueryBuilder
     */
    private $queryBuilder;

    /**
     * @var array
     */
    private $paginatedQueryBuilderResult = [];

    public function __construct(
        QueryBuilder $queryBuilder,
        int $currentPageNumber = 1,
        int $itemsPerPage = 10,
        int $initialLimit = 0,
        int $initialOffset = 0
    ) {
        $this->queryBuilder = $queryBuilder;
        $this->setCurrentPageNumber($currentPageNumber);
        $this->setItemsPerPage($itemsPerPage);
        $this->initialLimit = $initialLimit;
        $this->initialOffset = $initialOffset;
        $this->updateInternalState();
    }

    /**
     * @return iterable|array
     */
    public function getPaginatedItems(): iterable
    {
        return $this->paginatedQueryBuilderResult;
    }

    public function getTotalAmountOfItems(): int
    {
        return $this->queryBuilder->setFirstResult(0)->setMaxResults(9999999)->executeQuery()->rowCount();
    }

    public function getAmountOfItemsOnCurrentPage(): int
    {
        return count($this->paginatedQueryBuilderResult);
    }

    protected function updatePaginatedItems(int $limit, int $offset): void
    {
        $this->paginatedQueryBuilderResult = $this->queryBuilder->setFirstResult($offset)->setMaxResults($limit)->executeQuery()->fetchAllAssociative();
    }
}
