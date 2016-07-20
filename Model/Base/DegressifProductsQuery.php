<?php

namespace Degressif\Model\Base;

use \Exception;
use \PDO;
use Degressif\Model\DegressifProducts as ChildDegressifProducts;
use Degressif\Model\DegressifProductsQuery as ChildDegressifProductsQuery;
use Degressif\Model\Map\DegressifProductsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Thelia\Model\Product;

/**
 * Base class that represents a query for the 'degressif_products' table.
 *
 *
 *
 * @method     ChildDegressifProductsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDegressifProductsQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildDegressifProductsQuery orderByRef($order = Criteria::ASC) Order by the ref column
 * @method     ChildDegressifProductsQuery orderByTranchemin($order = Criteria::ASC) Order by the tranchemin column
 * @method     ChildDegressifProductsQuery orderByTranchemax($order = Criteria::ASC) Order by the tranchemax column
 * @method     ChildDegressifProductsQuery orderByPrix($order = Criteria::ASC) Order by the prix column
 * @method     ChildDegressifProductsQuery orderByPrix2($order = Criteria::ASC) Order by the prix2 column
 * @method     ChildDegressifProductsQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildDegressifProductsQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildDegressifProductsQuery groupById() Group by the id column
 * @method     ChildDegressifProductsQuery groupByProductId() Group by the product_id column
 * @method     ChildDegressifProductsQuery groupByRef() Group by the ref column
 * @method     ChildDegressifProductsQuery groupByTranchemin() Group by the tranchemin column
 * @method     ChildDegressifProductsQuery groupByTranchemax() Group by the tranchemax column
 * @method     ChildDegressifProductsQuery groupByPrix() Group by the prix column
 * @method     ChildDegressifProductsQuery groupByPrix2() Group by the prix2 column
 * @method     ChildDegressifProductsQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildDegressifProductsQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildDegressifProductsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDegressifProductsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDegressifProductsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDegressifProductsQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     ChildDegressifProductsQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     ChildDegressifProductsQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     ChildDegressifProducts findOne(ConnectionInterface $con = null) Return the first ChildDegressifProducts matching the query
 * @method     ChildDegressifProducts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDegressifProducts matching the query, or a new ChildDegressifProducts object populated from the query conditions when no match is found
 *
 * @method     ChildDegressifProducts findOneById(int $id) Return the first ChildDegressifProducts filtered by the id column
 * @method     ChildDegressifProducts findOneByProductId(int $product_id) Return the first ChildDegressifProducts filtered by the product_id column
 * @method     ChildDegressifProducts findOneByRef(string $ref) Return the first ChildDegressifProducts filtered by the ref column
 * @method     ChildDegressifProducts findOneByTranchemin(double $tranchemin) Return the first ChildDegressifProducts filtered by the tranchemin column
 * @method     ChildDegressifProducts findOneByTranchemax(double $tranchemax) Return the first ChildDegressifProducts filtered by the tranchemax column
 * @method     ChildDegressifProducts findOneByPrix(double $prix) Return the first ChildDegressifProducts filtered by the prix column
 * @method     ChildDegressifProducts findOneByPrix2(double $prix2) Return the first ChildDegressifProducts filtered by the prix2 column
 * @method     ChildDegressifProducts findOneByCreatedAt(string $created_at) Return the first ChildDegressifProducts filtered by the created_at column
 * @method     ChildDegressifProducts findOneByUpdatedAt(string $updated_at) Return the first ChildDegressifProducts filtered by the updated_at column
 *
 * @method     array findById(int $id) Return ChildDegressifProducts objects filtered by the id column
 * @method     array findByProductId(int $product_id) Return ChildDegressifProducts objects filtered by the product_id column
 * @method     array findByRef(string $ref) Return ChildDegressifProducts objects filtered by the ref column
 * @method     array findByTranchemin(double $tranchemin) Return ChildDegressifProducts objects filtered by the tranchemin column
 * @method     array findByTranchemax(double $tranchemax) Return ChildDegressifProducts objects filtered by the tranchemax column
 * @method     array findByPrix(double $prix) Return ChildDegressifProducts objects filtered by the prix column
 * @method     array findByPrix2(double $prix2) Return ChildDegressifProducts objects filtered by the prix2 column
 * @method     array findByCreatedAt(string $created_at) Return ChildDegressifProducts objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ChildDegressifProducts objects filtered by the updated_at column
 *
 */
abstract class DegressifProductsQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Degressif\Model\Base\DegressifProductsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\Degressif\\Model\\DegressifProducts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDegressifProductsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDegressifProductsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \Degressif\Model\DegressifProductsQuery) {
            return $criteria;
        }
        $query = new \Degressif\Model\DegressifProductsQuery();
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
     * @return ChildDegressifProducts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DegressifProductsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DegressifProductsTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildDegressifProducts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, PRODUCT_ID, REF, TRANCHEMIN, TRANCHEMAX, PRIX, PRIX2, CREATED_AT, UPDATED_AT FROM degressif_products WHERE ID = :p0';
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
            $obj = new ChildDegressifProducts();
            $obj->hydrate($row);
            DegressifProductsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildDegressifProducts|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
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
    public function findPks($keys, $con = null)
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
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DegressifProductsTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DegressifProductsTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DegressifProductsTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DegressifProductsTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DegressifProductsTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE product_id = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE product_id > 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(DegressifProductsTableMap::PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(DegressifProductsTableMap::PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DegressifProductsTableMap::PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the ref column
     *
     * Example usage:
     * <code>
     * $query->filterByRef('fooValue');   // WHERE ref = 'fooValue'
     * $query->filterByRef('%fooValue%'); // WHERE ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ref The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByRef($ref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ref)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ref)) {
                $ref = str_replace('*', '%', $ref);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DegressifProductsTableMap::REF, $ref, $comparison);
    }

    /**
     * Filter the query on the tranchemin column
     *
     * Example usage:
     * <code>
     * $query->filterByTranchemin(1234); // WHERE tranchemin = 1234
     * $query->filterByTranchemin(array(12, 34)); // WHERE tranchemin IN (12, 34)
     * $query->filterByTranchemin(array('min' => 12)); // WHERE tranchemin > 12
     * </code>
     *
     * @param     mixed $tranchemin The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByTranchemin($tranchemin = null, $comparison = null)
    {
        if (is_array($tranchemin)) {
            $useMinMax = false;
            if (isset($tranchemin['min'])) {
                $this->addUsingAlias(DegressifProductsTableMap::TRANCHEMIN, $tranchemin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tranchemin['max'])) {
                $this->addUsingAlias(DegressifProductsTableMap::TRANCHEMIN, $tranchemin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DegressifProductsTableMap::TRANCHEMIN, $tranchemin, $comparison);
    }

    /**
     * Filter the query on the tranchemax column
     *
     * Example usage:
     * <code>
     * $query->filterByTranchemax(1234); // WHERE tranchemax = 1234
     * $query->filterByTranchemax(array(12, 34)); // WHERE tranchemax IN (12, 34)
     * $query->filterByTranchemax(array('min' => 12)); // WHERE tranchemax > 12
     * </code>
     *
     * @param     mixed $tranchemax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByTranchemax($tranchemax = null, $comparison = null)
    {
        if (is_array($tranchemax)) {
            $useMinMax = false;
            if (isset($tranchemax['min'])) {
                $this->addUsingAlias(DegressifProductsTableMap::TRANCHEMAX, $tranchemax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tranchemax['max'])) {
                $this->addUsingAlias(DegressifProductsTableMap::TRANCHEMAX, $tranchemax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DegressifProductsTableMap::TRANCHEMAX, $tranchemax, $comparison);
    }

    /**
     * Filter the query on the prix column
     *
     * Example usage:
     * <code>
     * $query->filterByPrix(1234); // WHERE prix = 1234
     * $query->filterByPrix(array(12, 34)); // WHERE prix IN (12, 34)
     * $query->filterByPrix(array('min' => 12)); // WHERE prix > 12
     * </code>
     *
     * @param     mixed $prix The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByPrix($prix = null, $comparison = null)
    {
        if (is_array($prix)) {
            $useMinMax = false;
            if (isset($prix['min'])) {
                $this->addUsingAlias(DegressifProductsTableMap::PRIX, $prix['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prix['max'])) {
                $this->addUsingAlias(DegressifProductsTableMap::PRIX, $prix['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DegressifProductsTableMap::PRIX, $prix, $comparison);
    }

    /**
     * Filter the query on the prix2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPrix2(1234); // WHERE prix2 = 1234
     * $query->filterByPrix2(array(12, 34)); // WHERE prix2 IN (12, 34)
     * $query->filterByPrix2(array('min' => 12)); // WHERE prix2 > 12
     * </code>
     *
     * @param     mixed $prix2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByPrix2($prix2 = null, $comparison = null)
    {
        if (is_array($prix2)) {
            $useMinMax = false;
            if (isset($prix2['min'])) {
                $this->addUsingAlias(DegressifProductsTableMap::PRIX2, $prix2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prix2['max'])) {
                $this->addUsingAlias(DegressifProductsTableMap::PRIX2, $prix2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DegressifProductsTableMap::PRIX2, $prix2, $comparison);
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
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(DegressifProductsTableMap::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(DegressifProductsTableMap::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DegressifProductsTableMap::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(DegressifProductsTableMap::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(DegressifProductsTableMap::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DegressifProductsTableMap::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Thelia\Model\Product object
     *
     * @param \Thelia\Model\Product|ObjectCollection $product The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof \Thelia\Model\Product) {
            return $this
                ->addUsingAlias(DegressifProductsTableMap::PRODUCT_ID, $product->getId(), $comparison);
        } elseif ($product instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DegressifProductsTableMap::PRODUCT_ID, $product->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type \Thelia\Model\Product or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation Product object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\ProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', '\Thelia\Model\ProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDegressifProducts $degressifProducts Object to remove from the list of results
     *
     * @return ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function prune($degressifProducts = null)
    {
        if ($degressifProducts) {
            $this->addUsingAlias(DegressifProductsTableMap::ID, $degressifProducts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the degressif_products table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DegressifProductsTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DegressifProductsTableMap::clearInstancePool();
            DegressifProductsTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildDegressifProducts or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildDegressifProducts object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DegressifProductsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DegressifProductsTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        DegressifProductsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DegressifProductsTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(DegressifProductsTableMap::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(DegressifProductsTableMap::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(DegressifProductsTableMap::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(DegressifProductsTableMap::UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(DegressifProductsTableMap::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ChildDegressifProductsQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(DegressifProductsTableMap::CREATED_AT);
    }

} // DegressifProductsQuery
