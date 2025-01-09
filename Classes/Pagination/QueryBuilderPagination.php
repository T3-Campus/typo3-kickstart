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

use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Pagination\SlidingWindowPagination;

class QueryBuilderPagination
{
    /**
     * @var QueryBuilderPaginator
     */
    protected QueryBuilderPaginator $paginator;

    /**
     * @var SlidingWindowPagination
     */
    protected SlidingWindowPagination $pagination;

    /**
     * QueryBuilder
     * @var QueryBuilder
     */
    protected QueryBuilder $queryBuilder;

    public function __construct(
        QueryBuilder $queryBuilder,
        int $currentPageNumber = 1,
        int $itemsPerPage = 10,
        int $maximumLinks = 15
    ) {
        $this->queryBuilder = $queryBuilder;
        $this->paginator = new QueryBuilderPaginator($queryBuilder, $currentPageNumber, $itemsPerPage);
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
            'queryBuilder' => $this->queryBuilder
        ];
    }

	/**
	 * Get queryBuilder
	 *
	 * @return QueryBuilder
	 */
	public function getQueryBuilder(): QueryBuilder
	{
		return $this->queryBuilder;
	}

	/**
	 * Set queryBuilder
	 *
	 * @param QueryBuilder  $queryBuilder
	 *
	 * @return self
	 */
	public function setQueryBuilder(QueryBuilder $queryBuilder): self
	{
		$this->queryBuilder = $queryBuilder;

		return $this;
	}

	/**
	 * Get the value of paginator
	 *
	 * @return QueryBuilderPaginator
	 */
	public function getPaginator(): QueryBuilderPaginator
	{
		return $this->paginator;
	}

	/**
	 * Set the value of paginator
	 *
	 * @param QueryBuilderPaginator  $paginator
	 *
	 * @return self
	 */
	public function setPaginator(QueryBuilderPaginator $paginator): self
	{
		$this->paginator = $paginator;

		return $this;
	}
}
