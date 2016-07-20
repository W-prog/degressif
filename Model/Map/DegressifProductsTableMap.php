<?php

namespace Degressif\Model\Map;

use Degressif\Model\DegressifProducts;
use Degressif\Model\DegressifProductsQuery;
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
 * This class defines the structure of the 'degressif_products' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DegressifProductsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Degressif.Model.Map.DegressifProductsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'degressif_products';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Degressif\\Model\\DegressifProducts';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Degressif.Model.DegressifProducts';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the ID field
     */
    const ID = 'degressif_products.ID';

    /**
     * the column name for the PRODUCT_ID field
     */
    const PRODUCT_ID = 'degressif_products.PRODUCT_ID';

    /**
     * the column name for the REF field
     */
    const REF = 'degressif_products.REF';

    /**
     * the column name for the TRANCHEMIN field
     */
    const TRANCHEMIN = 'degressif_products.TRANCHEMIN';

    /**
     * the column name for the TRANCHEMAX field
     */
    const TRANCHEMAX = 'degressif_products.TRANCHEMAX';

    /**
     * the column name for the PRIX field
     */
    const PRIX = 'degressif_products.PRIX';

    /**
     * the column name for the PRIX2 field
     */
    const PRIX2 = 'degressif_products.PRIX2';

    /**
     * the column name for the CREATED_AT field
     */
    const CREATED_AT = 'degressif_products.CREATED_AT';

    /**
     * the column name for the UPDATED_AT field
     */
    const UPDATED_AT = 'degressif_products.UPDATED_AT';

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
        self::TYPE_PHPNAME       => array('Id', 'ProductId', 'Ref', 'Tranchemin', 'Tranchemax', 'Prix', 'Prix2', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'productId', 'ref', 'tranchemin', 'tranchemax', 'prix', 'prix2', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(DegressifProductsTableMap::ID, DegressifProductsTableMap::PRODUCT_ID, DegressifProductsTableMap::REF, DegressifProductsTableMap::TRANCHEMIN, DegressifProductsTableMap::TRANCHEMAX, DegressifProductsTableMap::PRIX, DegressifProductsTableMap::PRIX2, DegressifProductsTableMap::CREATED_AT, DegressifProductsTableMap::UPDATED_AT, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'PRODUCT_ID', 'REF', 'TRANCHEMIN', 'TRANCHEMAX', 'PRIX', 'PRIX2', 'CREATED_AT', 'UPDATED_AT', ),
        self::TYPE_FIELDNAME     => array('id', 'product_id', 'ref', 'tranchemin', 'tranchemax', 'prix', 'prix2', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProductId' => 1, 'Ref' => 2, 'Tranchemin' => 3, 'Tranchemax' => 4, 'Prix' => 5, 'Prix2' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'productId' => 1, 'ref' => 2, 'tranchemin' => 3, 'tranchemax' => 4, 'prix' => 5, 'prix2' => 6, 'createdAt' => 7, 'updatedAt' => 8, ),
        self::TYPE_COLNAME       => array(DegressifProductsTableMap::ID => 0, DegressifProductsTableMap::PRODUCT_ID => 1, DegressifProductsTableMap::REF => 2, DegressifProductsTableMap::TRANCHEMIN => 3, DegressifProductsTableMap::TRANCHEMAX => 4, DegressifProductsTableMap::PRIX => 5, DegressifProductsTableMap::PRIX2 => 6, DegressifProductsTableMap::CREATED_AT => 7, DegressifProductsTableMap::UPDATED_AT => 8, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'PRODUCT_ID' => 1, 'REF' => 2, 'TRANCHEMIN' => 3, 'TRANCHEMAX' => 4, 'PRIX' => 5, 'PRIX2' => 6, 'CREATED_AT' => 7, 'UPDATED_AT' => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'product_id' => 1, 'ref' => 2, 'tranchemin' => 3, 'tranchemax' => 4, 'prix' => 5, 'prix2' => 6, 'created_at' => 7, 'updated_at' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('degressif_products');
        $this->setPhpName('DegressifProducts');
        $this->setClassName('\\Degressif\\Model\\DegressifProducts');
        $this->setPackage('Degressif.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('PRODUCT_ID', 'ProductId', 'INTEGER', 'product', 'ID', true, null, null);
        $this->addColumn('REF', 'Ref', 'VARCHAR', false, 255, null);
        $this->addColumn('TRANCHEMIN', 'Tranchemin', 'FLOAT', false, null, null);
        $this->addColumn('TRANCHEMAX', 'Tranchemax', 'FLOAT', false, null, null);
        $this->addColumn('PRIX', 'Prix', 'FLOAT', false, null, null);
        $this->addColumn('PRIX2', 'Prix2', 'FLOAT', false, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', '\\Thelia\\Model\\Product', RelationMap::MANY_TO_ONE, array('product_id' => 'id', ), 'NO ACTION', 'NO ACTION');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
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
        return $withPrefix ? DegressifProductsTableMap::CLASS_DEFAULT : DegressifProductsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (DegressifProducts object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DegressifProductsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DegressifProductsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DegressifProductsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DegressifProductsTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DegressifProductsTableMap::addInstanceToPool($obj, $key);
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
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = DegressifProductsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DegressifProductsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DegressifProductsTableMap::addInstanceToPool($obj, $key);
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
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(DegressifProductsTableMap::ID);
            $criteria->addSelectColumn(DegressifProductsTableMap::PRODUCT_ID);
            $criteria->addSelectColumn(DegressifProductsTableMap::REF);
            $criteria->addSelectColumn(DegressifProductsTableMap::TRANCHEMIN);
            $criteria->addSelectColumn(DegressifProductsTableMap::TRANCHEMAX);
            $criteria->addSelectColumn(DegressifProductsTableMap::PRIX);
            $criteria->addSelectColumn(DegressifProductsTableMap::PRIX2);
            $criteria->addSelectColumn(DegressifProductsTableMap::CREATED_AT);
            $criteria->addSelectColumn(DegressifProductsTableMap::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.PRODUCT_ID');
            $criteria->addSelectColumn($alias . '.REF');
            $criteria->addSelectColumn($alias . '.TRANCHEMIN');
            $criteria->addSelectColumn($alias . '.TRANCHEMAX');
            $criteria->addSelectColumn($alias . '.PRIX');
            $criteria->addSelectColumn($alias . '.PRIX2');
            $criteria->addSelectColumn($alias . '.CREATED_AT');
            $criteria->addSelectColumn($alias . '.UPDATED_AT');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(DegressifProductsTableMap::DATABASE_NAME)->getTable(DegressifProductsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(DegressifProductsTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(DegressifProductsTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new DegressifProductsTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a DegressifProducts or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or DegressifProducts object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DegressifProductsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Degressif\Model\DegressifProducts) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DegressifProductsTableMap::DATABASE_NAME);
            $criteria->add(DegressifProductsTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = DegressifProductsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { DegressifProductsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { DegressifProductsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the degressif_products table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DegressifProductsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a DegressifProducts or Criteria object.
     *
     * @param mixed               $criteria Criteria or DegressifProducts object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DegressifProductsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from DegressifProducts object
        }

        if ($criteria->containsKey(DegressifProductsTableMap::ID) && $criteria->keyContainsValue(DegressifProductsTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DegressifProductsTableMap::ID.')');
        }


        // Set the correct dbName
        $query = DegressifProductsQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // DegressifProductsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DegressifProductsTableMap::buildTableMap();
