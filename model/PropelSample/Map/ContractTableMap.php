<?php

namespace PropelSample\Map;

use PropelSample\Contract;
use PropelSample\ContractQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'contract' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ContractTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'PropelSample.Map.ContractTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'contract';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\PropelSample\\Contract';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'PropelSample.Contract';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'contract.id';

    /**
     * the column name for the identifier field
     */
    const COL_IDENTIFIER = 'contract.identifier';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'contract.amount';

    /**
     * the column name for the details field
     */
    const COL_DETAILS = 'contract.details';

    /**
     * the column name for the valid_from field
     */
    const COL_VALID_FROM = 'contract.valid_from';

    /**
     * the column name for the valid_to field
     */
    const COL_VALID_TO = 'contract.valid_to';

    /**
     * the column name for the file field
     */
    const COL_FILE = 'contract.file';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'contract.status';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'contract.created_at';

    /**
     * the column name for the modified_at field
     */
    const COL_MODIFIED_AT = 'contract.modified_at';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'contract.customer_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Identifier', 'Amount', 'Details', 'ValidFrom', 'ValidTo', 'File', 'Status', 'CreatedAt', 'ModifiedAt', 'CustomerId', ),
        self::TYPE_CAMELNAME     => array('id', 'identifier', 'amount', 'details', 'validFrom', 'validTo', 'file', 'status', 'createdAt', 'modifiedAt', 'customerId', ),
        self::TYPE_COLNAME       => array(ContractTableMap::COL_ID, ContractTableMap::COL_IDENTIFIER, ContractTableMap::COL_AMOUNT, ContractTableMap::COL_DETAILS, ContractTableMap::COL_VALID_FROM, ContractTableMap::COL_VALID_TO, ContractTableMap::COL_FILE, ContractTableMap::COL_STATUS, ContractTableMap::COL_CREATED_AT, ContractTableMap::COL_MODIFIED_AT, ContractTableMap::COL_CUSTOMER_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'identifier', 'amount', 'details', 'valid_from', 'valid_to', 'file', 'status', 'created_at', 'modified_at', 'customer_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Identifier' => 1, 'Amount' => 2, 'Details' => 3, 'ValidFrom' => 4, 'ValidTo' => 5, 'File' => 6, 'Status' => 7, 'CreatedAt' => 8, 'ModifiedAt' => 9, 'CustomerId' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'identifier' => 1, 'amount' => 2, 'details' => 3, 'validFrom' => 4, 'validTo' => 5, 'file' => 6, 'status' => 7, 'createdAt' => 8, 'modifiedAt' => 9, 'customerId' => 10, ),
        self::TYPE_COLNAME       => array(ContractTableMap::COL_ID => 0, ContractTableMap::COL_IDENTIFIER => 1, ContractTableMap::COL_AMOUNT => 2, ContractTableMap::COL_DETAILS => 3, ContractTableMap::COL_VALID_FROM => 4, ContractTableMap::COL_VALID_TO => 5, ContractTableMap::COL_FILE => 6, ContractTableMap::COL_STATUS => 7, ContractTableMap::COL_CREATED_AT => 8, ContractTableMap::COL_MODIFIED_AT => 9, ContractTableMap::COL_CUSTOMER_ID => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'identifier' => 1, 'amount' => 2, 'details' => 3, 'valid_from' => 4, 'valid_to' => 5, 'file' => 6, 'status' => 7, 'created_at' => 8, 'modified_at' => 9, 'customer_id' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('contract');
        $this->setPhpName('Contract');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\PropelSample\\Contract');
        $this->setPackage('PropelSample');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('identifier', 'Identifier', 'VARCHAR', true, 20, '');
        $this->addColumn('amount', 'Amount', 'BIGINT', true, null, null);
        $this->addColumn('details', 'Details', 'LONGVARCHAR', false, null, null);
        $this->addColumn('valid_from', 'ValidFrom', 'DATE', true, null, null);
        $this->addColumn('valid_to', 'ValidTo', 'DATE', false, null, null);
        $this->addColumn('file', 'File', 'BLOB', false, null, null);
        $this->addColumn('status', 'Status', 'CHAR', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('modified_at', 'ModifiedAt', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addForeignKey('customer_id', 'CustomerId', 'INTEGER', 'customer', 'id', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Customer', '\\PropelSample\\Customer', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':customer_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Payment', '\\PropelSample\\Payment', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':contract_id',
    1 => ':id',
  ),
), 'SET NULL', null, 'Payments', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to contract     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        PaymentTableMap::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ContractTableMap::CLASS_DEFAULT : ContractTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Contract object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ContractTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ContractTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ContractTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ContractTableMap::OM_CLASS;
            /** @var Contract $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ContractTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ContractTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ContractTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Contract $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ContractTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ContractTableMap::COL_ID);
            $criteria->addSelectColumn(ContractTableMap::COL_IDENTIFIER);
            $criteria->addSelectColumn(ContractTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(ContractTableMap::COL_DETAILS);
            $criteria->addSelectColumn(ContractTableMap::COL_VALID_FROM);
            $criteria->addSelectColumn(ContractTableMap::COL_VALID_TO);
            $criteria->addSelectColumn(ContractTableMap::COL_FILE);
            $criteria->addSelectColumn(ContractTableMap::COL_STATUS);
            $criteria->addSelectColumn(ContractTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(ContractTableMap::COL_MODIFIED_AT);
            $criteria->addSelectColumn(ContractTableMap::COL_CUSTOMER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.identifier');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.details');
            $criteria->addSelectColumn($alias . '.valid_from');
            $criteria->addSelectColumn($alias . '.valid_to');
            $criteria->addSelectColumn($alias . '.file');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.modified_at');
            $criteria->addSelectColumn($alias . '.customer_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ContractTableMap::DATABASE_NAME)->getTable(ContractTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ContractTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ContractTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ContractTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Contract or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Contract object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContractTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \PropelSample\Contract) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ContractTableMap::DATABASE_NAME);
            $criteria->add(ContractTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ContractQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ContractTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ContractTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the contract table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ContractQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Contract or Criteria object.
     *
     * @param mixed               $criteria Criteria or Contract object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContractTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Contract object
        }

        if ($criteria->containsKey(ContractTableMap::COL_ID) && $criteria->keyContainsValue(ContractTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ContractTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ContractQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ContractTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ContractTableMap::buildTableMap();
