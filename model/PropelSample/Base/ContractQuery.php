<?php

namespace PropelSample\Base;

use \Exception;
use \PDO;
use PropelSample\Contract as ChildContract;
use PropelSample\ContractQuery as ChildContractQuery;
use PropelSample\Map\ContractTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'contract' table.
 *
 *
 *
 * @method     ChildContractQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildContractQuery orderByIdentifier($order = Criteria::ASC) Order by the identifier column
 * @method     ChildContractQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildContractQuery orderByDetails($order = Criteria::ASC) Order by the details column
 * @method     ChildContractQuery orderByValidFrom($order = Criteria::ASC) Order by the valid_from column
 * @method     ChildContractQuery orderByValidTo($order = Criteria::ASC) Order by the valid_to column
 * @method     ChildContractQuery orderByFile($order = Criteria::ASC) Order by the file column
 * @method     ChildContractQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildContractQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildContractQuery orderByModifiedAt($order = Criteria::ASC) Order by the modified_at column
 * @method     ChildContractQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 *
 * @method     ChildContractQuery groupById() Group by the id column
 * @method     ChildContractQuery groupByIdentifier() Group by the identifier column
 * @method     ChildContractQuery groupByAmount() Group by the amount column
 * @method     ChildContractQuery groupByDetails() Group by the details column
 * @method     ChildContractQuery groupByValidFrom() Group by the valid_from column
 * @method     ChildContractQuery groupByValidTo() Group by the valid_to column
 * @method     ChildContractQuery groupByFile() Group by the file column
 * @method     ChildContractQuery groupByStatus() Group by the status column
 * @method     ChildContractQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildContractQuery groupByModifiedAt() Group by the modified_at column
 * @method     ChildContractQuery groupByCustomerId() Group by the customer_id column
 *
 * @method     ChildContractQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildContractQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildContractQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildContractQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildContractQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildContractQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildContractQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     ChildContractQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     ChildContractQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     ChildContractQuery joinWithCustomer($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Customer relation
 *
 * @method     ChildContractQuery leftJoinWithCustomer() Adds a LEFT JOIN clause and with to the query using the Customer relation
 * @method     ChildContractQuery rightJoinWithCustomer() Adds a RIGHT JOIN clause and with to the query using the Customer relation
 * @method     ChildContractQuery innerJoinWithCustomer() Adds a INNER JOIN clause and with to the query using the Customer relation
 *
 * @method     ChildContractQuery leftJoinPayment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Payment relation
 * @method     ChildContractQuery rightJoinPayment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Payment relation
 * @method     ChildContractQuery innerJoinPayment($relationAlias = null) Adds a INNER JOIN clause to the query using the Payment relation
 *
 * @method     ChildContractQuery joinWithPayment($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Payment relation
 *
 * @method     ChildContractQuery leftJoinWithPayment() Adds a LEFT JOIN clause and with to the query using the Payment relation
 * @method     ChildContractQuery rightJoinWithPayment() Adds a RIGHT JOIN clause and with to the query using the Payment relation
 * @method     ChildContractQuery innerJoinWithPayment() Adds a INNER JOIN clause and with to the query using the Payment relation
 *
 * @method     \PropelSample\CustomerQuery|\PropelSample\PaymentQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildContract findOne(ConnectionInterface $con = null) Return the first ChildContract matching the query
 * @method     ChildContract findOneOrCreate(ConnectionInterface $con = null) Return the first ChildContract matching the query, or a new ChildContract object populated from the query conditions when no match is found
 *
 * @method     ChildContract findOneById(int $id) Return the first ChildContract filtered by the id column
 * @method     ChildContract findOneByIdentifier(string $identifier) Return the first ChildContract filtered by the identifier column
 * @method     ChildContract findOneByAmount(string $amount) Return the first ChildContract filtered by the amount column
 * @method     ChildContract findOneByDetails(string $details) Return the first ChildContract filtered by the details column
 * @method     ChildContract findOneByValidFrom(string $valid_from) Return the first ChildContract filtered by the valid_from column
 * @method     ChildContract findOneByValidTo(string $valid_to) Return the first ChildContract filtered by the valid_to column
 * @method     ChildContract findOneByFile(resource $file) Return the first ChildContract filtered by the file column
 * @method     ChildContract findOneByStatus(string $status) Return the first ChildContract filtered by the status column
 * @method     ChildContract findOneByCreatedAt(string $created_at) Return the first ChildContract filtered by the created_at column
 * @method     ChildContract findOneByModifiedAt(string $modified_at) Return the first ChildContract filtered by the modified_at column
 * @method     ChildContract findOneByCustomerId(int $customer_id) Return the first ChildContract filtered by the customer_id column *

 * @method     ChildContract requirePk($key, ConnectionInterface $con = null) Return the ChildContract by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOne(ConnectionInterface $con = null) Return the first ChildContract matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildContract requireOneById(int $id) Return the first ChildContract filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOneByIdentifier(string $identifier) Return the first ChildContract filtered by the identifier column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOneByAmount(string $amount) Return the first ChildContract filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOneByDetails(string $details) Return the first ChildContract filtered by the details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOneByValidFrom(string $valid_from) Return the first ChildContract filtered by the valid_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOneByValidTo(string $valid_to) Return the first ChildContract filtered by the valid_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOneByFile(resource $file) Return the first ChildContract filtered by the file column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOneByStatus(string $status) Return the first ChildContract filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOneByCreatedAt(string $created_at) Return the first ChildContract filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOneByModifiedAt(string $modified_at) Return the first ChildContract filtered by the modified_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContract requireOneByCustomerId(int $customer_id) Return the first ChildContract filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildContract[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildContract objects based on current ModelCriteria
 * @method     ChildContract[]|ObjectCollection findById(int $id) Return ChildContract objects filtered by the id column
 * @method     ChildContract[]|ObjectCollection findByIdentifier(string $identifier) Return ChildContract objects filtered by the identifier column
 * @method     ChildContract[]|ObjectCollection findByAmount(string $amount) Return ChildContract objects filtered by the amount column
 * @method     ChildContract[]|ObjectCollection findByDetails(string $details) Return ChildContract objects filtered by the details column
 * @method     ChildContract[]|ObjectCollection findByValidFrom(string $valid_from) Return ChildContract objects filtered by the valid_from column
 * @method     ChildContract[]|ObjectCollection findByValidTo(string $valid_to) Return ChildContract objects filtered by the valid_to column
 * @method     ChildContract[]|ObjectCollection findByFile(resource $file) Return ChildContract objects filtered by the file column
 * @method     ChildContract[]|ObjectCollection findByStatus(string $status) Return ChildContract objects filtered by the status column
 * @method     ChildContract[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildContract objects filtered by the created_at column
 * @method     ChildContract[]|ObjectCollection findByModifiedAt(string $modified_at) Return ChildContract objects filtered by the modified_at column
 * @method     ChildContract[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildContract objects filtered by the customer_id column
 * @method     ChildContract[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ContractQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \PropelSample\Base\ContractQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PropelSample\\Contract', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildContractQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildContractQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildContractQuery) {
            return $criteria;
        }
        $query = new ChildContractQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildContract|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ContractTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ContractTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildContract A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `identifier`, `amount`, `details`, `valid_from`, `valid_to`, `file`, `status`, `created_at`, `modified_at`, `customer_id` FROM `contract` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildContract $obj */
            $obj = new ChildContract();
            $obj->hydrate($row);
            ContractTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildContract|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContractTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContractTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ContractTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ContractTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the identifier column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentifier('fooValue');   // WHERE identifier = 'fooValue'
     * $query->filterByIdentifier('%fooValue%', Criteria::LIKE); // WHERE identifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identifier The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByIdentifier($identifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identifier)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTableMap::COL_IDENTIFIER, $identifier, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ContractTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ContractTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the details column
     *
     * Example usage:
     * <code>
     * $query->filterByDetails('fooValue');   // WHERE details = 'fooValue'
     * $query->filterByDetails('%fooValue%', Criteria::LIKE); // WHERE details LIKE '%fooValue%'
     * </code>
     *
     * @param     string $details The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByDetails($details = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($details)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTableMap::COL_DETAILS, $details, $comparison);
    }

    /**
     * Filter the query on the valid_from column
     *
     * Example usage:
     * <code>
     * $query->filterByValidFrom('2011-03-14'); // WHERE valid_from = '2011-03-14'
     * $query->filterByValidFrom('now'); // WHERE valid_from = '2011-03-14'
     * $query->filterByValidFrom(array('max' => 'yesterday')); // WHERE valid_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $validFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByValidFrom($validFrom = null, $comparison = null)
    {
        if (is_array($validFrom)) {
            $useMinMax = false;
            if (isset($validFrom['min'])) {
                $this->addUsingAlias(ContractTableMap::COL_VALID_FROM, $validFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validFrom['max'])) {
                $this->addUsingAlias(ContractTableMap::COL_VALID_FROM, $validFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTableMap::COL_VALID_FROM, $validFrom, $comparison);
    }

    /**
     * Filter the query on the valid_to column
     *
     * Example usage:
     * <code>
     * $query->filterByValidTo('2011-03-14'); // WHERE valid_to = '2011-03-14'
     * $query->filterByValidTo('now'); // WHERE valid_to = '2011-03-14'
     * $query->filterByValidTo(array('max' => 'yesterday')); // WHERE valid_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $validTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByValidTo($validTo = null, $comparison = null)
    {
        if (is_array($validTo)) {
            $useMinMax = false;
            if (isset($validTo['min'])) {
                $this->addUsingAlias(ContractTableMap::COL_VALID_TO, $validTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validTo['max'])) {
                $this->addUsingAlias(ContractTableMap::COL_VALID_TO, $validTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTableMap::COL_VALID_TO, $validTo, $comparison);
    }

    /**
     * Filter the query on the file column
     *
     * @param     mixed $file The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByFile($file = null, $comparison = null)
    {

        return $this->addUsingAlias(ContractTableMap::COL_FILE, $file, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ContractTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ContractTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the modified_at column
     *
     * Example usage:
     * <code>
     * $query->filterByModifiedAt('2011-03-14'); // WHERE modified_at = '2011-03-14'
     * $query->filterByModifiedAt('now'); // WHERE modified_at = '2011-03-14'
     * $query->filterByModifiedAt(array('max' => 'yesterday')); // WHERE modified_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $modifiedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByModifiedAt($modifiedAt = null, $comparison = null)
    {
        if (is_array($modifiedAt)) {
            $useMinMax = false;
            if (isset($modifiedAt['min'])) {
                $this->addUsingAlias(ContractTableMap::COL_MODIFIED_AT, $modifiedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifiedAt['max'])) {
                $this->addUsingAlias(ContractTableMap::COL_MODIFIED_AT, $modifiedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTableMap::COL_MODIFIED_AT, $modifiedAt, $comparison);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @see       filterByCustomer()
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(ContractTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(ContractTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query by a related \PropelSample\Customer object
     *
     * @param \PropelSample\Customer|ObjectCollection $customer The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildContractQuery The current query, for fluid interface
     */
    public function filterByCustomer($customer, $comparison = null)
    {
        if ($customer instanceof \PropelSample\Customer) {
            return $this
                ->addUsingAlias(ContractTableMap::COL_CUSTOMER_ID, $customer->getId(), $comparison);
        } elseif ($customer instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContractTableMap::COL_CUSTOMER_ID, $customer->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCustomer() only accepts arguments of type \PropelSample\Customer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function joinCustomer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Customer');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Customer');
        }

        return $this;
    }

    /**
     * Use the Customer relation Customer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PropelSample\CustomerQuery A secondary query class using the current class as primary query
     */
    public function useCustomerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customer', '\PropelSample\CustomerQuery');
    }

    /**
     * Filter the query by a related \PropelSample\Payment object
     *
     * @param \PropelSample\Payment|ObjectCollection $payment the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildContractQuery The current query, for fluid interface
     */
    public function filterByPayment($payment, $comparison = null)
    {
        if ($payment instanceof \PropelSample\Payment) {
            return $this
                ->addUsingAlias(ContractTableMap::COL_ID, $payment->getContractId(), $comparison);
        } elseif ($payment instanceof ObjectCollection) {
            return $this
                ->usePaymentQuery()
                ->filterByPrimaryKeys($payment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPayment() only accepts arguments of type \PropelSample\Payment or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Payment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function joinPayment($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Payment');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Payment');
        }

        return $this;
    }

    /**
     * Use the Payment relation Payment object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PropelSample\PaymentQuery A secondary query class using the current class as primary query
     */
    public function usePaymentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPayment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Payment', '\PropelSample\PaymentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildContract $contract Object to remove from the list of results
     *
     * @return $this|ChildContractQuery The current query, for fluid interface
     */
    public function prune($contract = null)
    {
        if ($contract) {
            $this->addUsingAlias(ContractTableMap::COL_ID, $contract->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the contract table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContractTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContractTableMap::clearInstancePool();
            ContractTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContractTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ContractTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ContractTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ContractTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ContractQuery
