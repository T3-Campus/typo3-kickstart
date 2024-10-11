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
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator as T3QueryResultPaginator;
use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class QueryResultPagination
{
    /**
     * @var T3QueryResultPaginator
     */
    protected T3QueryResultPaginator $paginator;

    /**
     * @var SlidingWindowPagination
     */
    protected SlidingWindowPagination $pagination;

    /**
     * QueryResult
     * @var QueryResult
     */
    protected QueryResult $queryResult;

    public function __construct(
        QueryResultInterface $queryResult,
        int $currentPageNumber = 1,
        int $itemsPerPage = 10,
        int $maximumLinks = 15
    ) {
        $this->queryResult = $queryResult;
        $this->paginator = new T3QueryResultPaginator($queryResult, $currentPageNumber, $itemsPerPage);
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
            'paginator' => $this->paginator,
            'queryResult' => $this->queryResult
        ];
    }

	/**
	 * Get queryResult
	 *
	 * @return QueryResult
	 */
	public function getQueryResult(): QueryResult
	{
		return $this->queryResult;
	}

	/**
	 * Set queryResult
	 *
	 * @param QueryResult  $queryResult
	 *
	 * @return self
	 */
	public function setQueryResult(QueryResult $queryResult): self
	{
		$this->queryResult = $queryResult;

		return $this;
	}
}