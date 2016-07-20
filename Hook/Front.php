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

/**
 * @todo : Hooker les tranches dans la pop-up du panier
 *
*/

namespace Degressif\Hook;

use Degressif\Degressif;
use Thelia\Core\Hook\BaseHook;
use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Event\Hook\HookRenderBlockEvent;
use Thelia\Model;
use Degressif\Model\Base\DegressifProductsQuery;
use Thelia\Model\ProductQuery;
use Thelia\Model\Base\TaxRuleQuery;
use Thelia\Model\Base\CountryQuery;
use Thelia\TaxEngine\Calculator;
use Thelia\Core\Translation\Translator;
use Thelia\Model\ModuleConfig;
use Thelia\Model\ModuleConfigQuery;

/**
 * Class Front
 *
 * @package Degressif\Hook
 * @author Willy SWENDRA <willy@w-prog.com>
 */
class Front extends BaseHook {


    public function onProductStylesheet(HookRenderEvent $event)
    {
        $content = $this->addCSS('assets/css/styles.css');
        $event->add($content);
    }

    public function onCartStylesheet(HookRenderEvent $event)
    {
        $content = $this->addCSS('assets/css/styles.css');
        $event->add($content);
    }

    public function onProductDetailsBottom(HookRenderEvent $event)
    {
        $titre= Translator::getInstance()->trans("Achetez en volume",[],degressif::MESSAGE_DOMAIN);
        $html = array('<caption>'.$titre.'</caption>');
        $product_id = intval($event->getArgument('product', null));
        $fooDegressif = DegressifProductsQuery::create()->findByProductId($product_id);
        $copy = '*Module ';
        // Calcul de la TVA
        $fooCountry = CountryQuery::create()->filterByIsoalpha2('FR')->FindOne();//64
        $country_id = $fooCountry->getId();
        $product = ProductQuery::create()->findOneById($product_id);
        $tax_rule_id = $product->getTaxRuleId();
        $taxRule = TaxRuleQuery::create()->findPk($tax_rule_id);
        $calculer_taxe=false;
        $copy.='Degressif ';
        if (null !== $taxRule) {
            $taxCalculator = new Calculator();
            $country = CountryQuery::create()->findOneById($country_id);
            $taxCalculator->loadTaxRuleWithoutProduct($taxRule, $country);
            $calculer_taxe=true;
            $unit_prix = Translator::getInstance()->trans("TTC",[],degressif::MESSAGE_DOMAIN);
        }else {
            $unit_prix = Translator::getInstance()->trans("HT",[],degressif::MESSAGE_DOMAIN);
        }
        $copy.=Translator::getInstance()->trans("fourni",[],degressif::MESSAGE_DOMAIN)." ";
        $euro = Translator::getInstance()->trans("EURO",[],degressif::MESSAGE_DOMAIN);
        if (null !== $fooDegressif){
            $html[] .= '<ul>';
            $copy.='<a href="http://www.w-pr';
            foreach($fooDegressif as $degressif){
                $html[] .= '<li class="quantity_price"> De '. $degressif->getTranchemin().' &agrave; ' . $degressif->getTranchemax();

                $prix =$degressif->getPrix();
                if ($calculer_taxe){
                    $prix_ttc = $taxCalculator->getTaxedPrice($prix);
                    $prix= $prix_ttc;
                }
                $prix2 =$degressif->getPrix2();
                if (!empty($prix2)){
                    if ($calculer_taxe){
                        $prix2_ttc = $taxCalculator->getTaxedPrice($prix2);
                        $prix2 = $prix2_ttc;
                    }
                    $Prix ='<span class="prix">'.$prix2.' '.$euro.'&nbsp; '.$unit_prix.' &nbsp;<span class="prix_barre">('.$prix.'&nbsp;'.$euro.'&nbsp;'.$unit_prix.')</span></span>';
                }else{
                    $Prix ='<span class="prix">'.$prix.'&nbsp;'.$euro.'&nbsp;'.$unit_prix.'</span>';
                }
                $html[].= ' : '.$Prix;
                $html[].= '</li>';
            }
            $copy.='og.com" target="_blank">www.w-p';
            $html[] .= '</ul>';
            $copy.='rog.com</a>';
            $html[].='<span class="fc_blue fs_8">'.$copy.'</span>';
            $event->add(implode($html));
        }

    }

    public function onProductAdditional(HookRenderBlockEvent $event)
    {
        /*
        $product_id = intval($event->getArgument('product', null));
        $fooDegressif = DegressifProductsQuery::create()->findByProductId($product_id);
        // Calcul de la TVA
        $fooCountry = CountryQuery::create()->filterByIsoalpha2('FR')->FindOne();//64
        $country_id = $fooCountry->getId();
        $product = ProductQuery::create()->findOneById($product_id);
        $tax_rule_id = $product->getTaxRuleId();
        $taxRule = TaxRuleQuery::create()->findPk($tax_rule_id);
        $calculer_taxe=false;
        if (null !== $taxRule) {
            $taxCalculator = new Calculator();
            $country = CountryQuery::create()->findOneById($country_id);
            $taxCalculator->loadTaxRuleWithoutProduct($taxRule, $country);
            $calculer_taxe=true;
            $unit_prix = "TTC";
        }else {
            $unit_prix = "HT";
        }
        $style_prix='font-size: 14px;line-height: 25px;font-style: normal;font-weight: 400;color: #f49a17;';
        $style_barre='font-size: 14px;line-height: 25px;font-style: italic;font-weight: 400; text-decoration: line-through; color: #7a7a7a;';

        if (null !== $fooDegressif){
            $html = array('<ul>');
            foreach($fooDegressif as $degressif){
                $html[] = '<li> de '. $degressif->getTranchemin().' &agrave; ' . $degressif->getTranchemax();
                $prix =$degressif->getPrix();
                if ($calculer_taxe){
                    $prix_ttc = $taxCalculator->getTaxedPrice($prix);
                    $prix= $prix_ttc;
                }
                $prix2 =$degressif->getPrix2();

                if (!empty($prix2)){
                    if ($calculer_taxe){
                        $prix2_ttc = $taxCalculator->getTaxedPrice($prix2);
                        $prix2 = $prix2_ttc;
                    }
                    $Prix ='<span style="'.$style_prix.'">'.$prix2.'&euro;&nbsp; '.$unit_prix.' &nbsp;<span style="'.$style_barre.'">('.$prix.' &euro;'.$unit_prix.')</span></span>';
                }else{
                    $Prix =$prix.' &euro; '.$unit_prix;
                }

                $html[].= ' : '.$Prix;
                $html[].= '</li>';
            }
            $html[]. = '</ul>';
            $event->add(array(
                "id" => "related-content",
                "title" => Translator::getInstance()->trans("Achetez en volume",[],MESSAGE_DOMAIN),
                "content" => implode($html)
            ));
        }
        */
    }
    public function onProductDetailsTop(HookRenderEvent $event)
    {
        /*
        // retrieve the product id (argument of the smarty hook function)
        $product_id = $event->getArgument('product', null);

        // get the cart from the BaseHook class
        $cart = $this->getCart();
        if (null !== $product_id && null !== $cart){
            foreach($cart->getCartItems() as $cartItem){
                if ($cartItem->getProductId() == $product_id){
                    // Add the content to the event
                    $event->add("<p>Ce produit est déjà dans votre panier.</p>");
                    return;
                }
            }
        }
        $event->add("<p>Pas encore encore dans le panier</p>");
        */

    }
    public function onModuleConfigure(HookRenderEvent $event)
    {

        // $vars = [ 'trace_content' => nl2br($traces)  ];

        $vars=array();

        if (null !== $params = ModuleConfigQuery::create()->findByModuleId(Degressif::getModuleId())) {
            // print_r($params);
            /** @var ModuleConfig $param */
            foreach ($params as $param) {
                $vars[ $param->getName() ] = $param->getValue();
            }
        }


        $event->add(
            $this->render('degressif/module-configuration.html', $vars)
        );
    }

}