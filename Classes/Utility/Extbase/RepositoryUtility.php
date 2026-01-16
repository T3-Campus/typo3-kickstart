<?php
declare(strict_types = 1);

namespace Slavlee\CustomPackage\Utility\Extbase;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser;
use TYPO3\CMS\Extbase\Persistence\Repository;

/***
 *
 * This file is part of the "custom_package" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Kevin Chileong Lee &lt;info@slavlee.de&gt;, Slavlee
 *
 ***/

class RepositoryUtility
{
	/**
     * Debug Query
     * @param Query $query
     * @return void
     */
    public static function debugQuery(Query $query)
	{
		$queryParser = GeneralUtility::makeInstanceForDi(Typo3DbQueryParser::class);
		$parameters = $queryParser->convertQueryToDoctrineQueryBuilder($query)->getParameters();
		$sql = $queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL();

		foreach($parameters as $placeholder => $value)
		{
			$sql = preg_replace('/:' . $placeholder . '/', (string)$value, $sql, 1);
		}

		var_dump($sql);
	}

    /**
     * Disable the usage of storage page uid
     * @param Repository $repository
     */
    public static function disableRespectStoragePage(Repository &$repository)
    {
        $querySettings = $repository->createQuery()->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $repository->setDefaultQuerySettings($querySettings);
    }

    /**
     * Set storage page ids in query settings
     * @param Repository $repository
     * @param array $pids
     */
    public static function setStoragePageIds(Repository &$repository, array $pids)
    {
        $querySettings = $repository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds($pids);
        $repository->setDefaultQuerySettings($querySettings);
    }

    /**
     * Return constraint to use it for contains
     * @param \TYPO3\CMS\Extbase\Persistence\Generic\Query $query
     * @param array $categories
     * @param string $propertyName
     * @return array
     */
    public static function getSystemCategoryContainsConstraint(Query &$query, array $categories, string $propertyName): array
    {
        $constraints = [];

        foreach($categories as $category) {
            $constraints[] = $query->contains($propertyName, $category);
        }

        return $constraints;
    }
}

