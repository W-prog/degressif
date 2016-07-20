<?php
/*************************************************************************************/
/*      This file is part of the module Degressif                                    */
/*                                                                                   */
/*      Copyright (c) OpenStudio + W-Prog                                            */
/*      email : willy@w-prog.com                                                     */
/*      web : http://www.-prog.com                                                   */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace Degressif\EventListeners;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Thelia\Core\Event\Cart\CartEvent;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Core\HttpFoundation\Request;
use Thelia\Core\Security\SecurityContext;
use Degressif\Model\Base\DegressifProductsQuery;

/**
 * Class DegressifListener
 * @package Degressif\EventListener
 * @author Willy SWENDRA <willy@w-prog.com>
 */
class DegressifListener implements EventSubscriberInterface
{
    /** @var EventDispatcherInterface */
    protected $eventDispatcher;

    /** @var SecurityContext */
    protected $securityContext;

    /** @var Request */
    protected $request;

    /**
     * @param EventDispatcherInterface $eventDispatcher
     * @param SecurityContext $securityContext
     * @param Request $request
     */

    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        SecurityContext $securityContext,
        Request $request
    ) {
        $this->eventDispatcher = $eventDispatcher;

        $this->securityContext = $securityContext;

        $this->request = $request;
    }


    /**
     *
     * Rafraichit les prix du panier en fonction de la quantité
     *
     */
    public function miseajourPanier(CartEvent $event)
    {
        $cart = $event->getCart();
        $currency = $cart->getCurrency();

        $customer = $cart->getCustomer();
        $discount = 0;

        if (null !== $customer && $customer->getDiscount() > 0) {
            $discount = $customer->getDiscount();
        }

        // cart item
        foreach ($cart->getCartItems() as $cartItem) {

            $trouv_degressif = false;
            $product_id = $cartItem->getProductId();
            $quantite = $cartItem->getQuantity();
            $fooDegressif = DegressifProductsQuery::create()
                ->filterByProductId($product_id)
                ->filterByTranchemin(array('max' => $quantite))
                ->filterByTranchemax(array('min' => $quantite))
                ->find();

            // Trouver un moyen d'accèder à con pour activer le mode debug
            //$con->useDebug(true);
            // echo "getLastExecutedQuery : ".$con->getLastExecutedQuery();

            $nbDegressif = sizeof($fooDegressif);
            if (null !== $fooDegressif) {
                foreach($fooDegressif as $degressif){
                    $trouv_degressif=true;
                    $prix = $degressif->getPrix();
                    $prix2 = $degressif->getPrix2();
                    $cartItem->setPrice($prix);
                    if (!empty($prix2))
                        $cartItem->setPromoPrice($prix2);
                    $cartItem->save();
                }
                // update the currency cart
                $cart->setCurrencyId($currency->getId());
                $cart->save();

            }

            if (!$trouv_degressif){
                // Si on ne trouve pas de prix degressif on applique le prix normal
                $productSaleElements = $cartItem->getProductSaleElements();
                if (null !== $productSaleElements) {
                    $productPrice = $productSaleElements->getPricesByCurrency($currency, $discount);
                    // echo "prix normal : ".$productPrice->getPrice()."<br />";
                    $cartItem
                        ->setPrice($productPrice->getPrice())
                        ->setPromoPrice($productPrice->getPromoPrice());

                    $cartItem->save();
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {

        return array(
            TheliaEvents::CART_ADDITEM => array("miseajourPanier", 128),
            TheliaEvents::CART_UPDATEITEM => array("miseajourPanier", 128),
            TheliaEvents::CART_DELETEITEM => array("miseajourPanier", 128),
        );
    }
}
