<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio + W-Prog                                            */
/*      email : willy@w-prog.com                                                     */
/*      web : http://www.-prog.com                                                   */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/


namespace Degressif\Loop;

use Propel\Runtime\ActiveQuery\Criteria;
use Thelia\Core\Template\Element\BaseLoop;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;
use Thelia\Core\Template\Element\PropelSearchLoopInterface;
use Thelia\Core\Template\Loop\Argument\Argument;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;
use Degressif\Model\Base\DegressifProductsQuery;
/**
 * Class DegressifLoop
 * @package Degressif\DegressifLoop
 * @author Willy SWENDRA <willy@w-prog.com>
 */
class DegressifLoop extends BaseLoop implements PropelSearchLoopInterface
{
   /*
   protected $timestampable = false;
   protected $versionable = false;
   protected $countable = true;
   */

    /**
    * @return ArgumentCollection
    */
    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
            Argument::createIntTypeArgument('product_id')
        );
    }

    public function buildModelCriteria()
    {

        $query = DegressifProductsQuery::create();

        $product_id = $this->getArgValue('product_id');
        if (null !== $product_id ) {
            $query->filterByProductId($product_id , Criteria::EQUAL)->find();
        }

        return $query;
    }

    /**
     * @param LoopResult $loopResult
     * @return LoopResult
     */
    public function parseResults(LoopResult $loopResult)
    {

        foreach ($loopResult->getResultDataCollection() as $ligne) {
            $loopResultRow = (new LoopResultRow($ligne))
                ->set('ID', $ligne->getID())
                ->set('PRODUCT_ID', $ligne->getProductId())
                ->set('REF', $ligne->getRef())
                ->set('TRANCHEMIN', $ligne->getTranchemin())
                ->set('TRANCHEMAX', $ligne->getTranchemax())
                ->set('PRIX', $ligne->getPrix())
                ->set('PRIX2', $ligne->getPrix2());

            $loopResult->addRow($loopResultRow);
        }

        return $loopResult;
    }

}