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


namespace Degressif\Controller;

use Degressif\Degressif;
use Degressif\Model\Base\DegressifProductsQuery;
use Degressif\Model\DegressifProducts;
use Propel\Runtime\Map\TableMap;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;

/**
 * Class BackController
 * @package Degressif\Controller
 * @author Willy SWENDRA <willy@w-prog.com>
 */
class BackController extends BaseAdminController
{
    protected $currentRouter = 'router.degressif';

    protected $useFallbackTemplate = true;

    /**
     * Update et Insert
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function saveAction()
    {
        $response = $this->checkAuth([], ['degressif'], AccessManager::UPDATE);

        if (null !== $response) {
            return $response;
        }

        $this->checkXmlHttpRequest();

        $responseData = [
            "success" => false,
            "message" => '',
            "slice" => null
        ];

        $messages = [];
        $response = null;

        try {
            $requestData = $this->getRequest()->request;
            // print_r($requestData->get());
            $product_id = $this->getRequest()->request->get('product_id');
            // echo "product_id  : ".$product_id;

            if (0 !== $id = intval($requestData->get('id', 0))) {
                $degressif = DegressifProductsQuery::create()->findPk($id); // Update
            } else {
                $degressif  = new DegressifProducts();// Insert
            }

            if (0 !== $product_id = $requestData->get('product_id')) {
                $degressif->setProductId($product_id);
            } else {
                $messages[] = $this->getTranslator()->trans(
                    'The product is not valid : '.$product_id,
                    [],
                    Degressif::MESSAGE_DOMAIN
                );
            }

            if (0 !== $ref = $requestData->get('ref')) {
                $degressif->setProductId($product_id);
            } else {
                $messages[] = $this->getTranslator()->trans(
                    'The ref is not valid : '.$ref,
                    [],
                    Degressif::MESSAGE_DOMAIN
                );
            }

            $tranchemin = intval($requestData->get('tranchemin'));
            if (0 < $tranchemin) {
                $degressif->setTranchemin($tranchemin);
            } else {
                $messages[] = $this->getTranslator()->trans(
                    'The tranche min is not valid : '.$tranchemin,
                    [],
                    Degressif::MESSAGE_DOMAIN
                );
            }

            $tranchemax = intval($requestData->get('tranchemax'));
            if (0 < $tranchemax) {
                $degressif->setTranchemax($tranchemax);
            } else {
                $messages[] = $this->getTranslator()->trans(
                    'The tranche max is not valid : '.$tranchemax,
                    [],
                    Degressif::MESSAGE_DOMAIN
                );
            }

            $prix = $this->getFloatVal($requestData->get('prix'));
            if (0 <= $prix) {
                $degressif->setPrix($prix);
            } else {
                $messages[] = $this->getTranslator()->trans(
                    'The prix value is not valid',
                    [],
                    Degressif::MESSAGE_DOMAIN
                );
            }

            $prix2 = $this->getFloatVal($requestData->get('prix2'));
            if (0 <= $prix2) {
                $degressif->setPrix2($prix2);
            }
            
            if (0 === count($messages)) {
                $degressif->save();
                $messages[] = $this->getTranslator()->trans(
                    'Your degressif has been saved',
                    [],
                    Degressif::MESSAGE_DOMAIN
                );

                $responseData['success'] = true;
                $responseData['slice'] = $degressif->toArray(TableMap::TYPE_STUDLYPHPNAME);
            }
        } catch (\Exception $e) {
            $message[] = $e->getMessage();
        }

        $responseData['message'] = $messages;

        return $this->jsonResponse(json_encode($responseData));
    }

    protected function getFloatVal($val, $default=-1) 
    {
        if (preg_match("#^([0-9\.,]+)$#", $val, $match)) {
            $val = $match[0];
            if(strstr($val, ",")) { 
                $val = str_replace(".", "", $val);
                $val = str_replace(",", ".", $val);
            }
            $val = floatval($val);
            
            return $val;
        }

        return $default;
    }

    /**
     * Suppression
     *
     * @return \Thelia\Core\HttpFoundation\Response
     */
    public function deleteAction()
    {
        $response = $this->checkAuth([], ['degressif'], AccessManager::DELETE);

        if (null !== $response) {
            return $response;
        }

        $this->checkXmlHttpRequest();

        $responseData = [
            "success" => false,
            "message" => '',
            "slice" => null
        ];

        $response = null;

        try {
            $requestData = $this->getRequest()->request;

            if (0 !== $id = intval($requestData->get('id', 0))) {
                $degressif = DegressifProductsQuery::create()->findPk($id);
                $degressif->delete();
                $responseData['success'] = true;
            } else {
                $responseData['message'] = $this->getTranslator()->trans(
                    'The tranche has not been deleted',
                    [],
                    Degressif::MESSAGE_DOMAIN
                );
            }
        } catch (\Exception $e) {
            $responseData['message'] = $e->getMessage();
        }

        return $this->jsonResponse(json_encode($responseData));
    }

}
