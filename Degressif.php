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

namespace Degressif;

use Thelia\Module\BaseModule;
use Propel\Runtime\Connection\ConnectionInterface;
use Thelia\Install\Database;
use Thelia\Core\Translation\Translator;

class Degressif extends BaseModule
{
    /** @var string */
    const DOMAIN_NAME = 'degressif';
    const MESSAGE_DOMAIN = "degressif";

    /** @var Translator */
    protected $translator;

    public $copy="*";

    public function postActivation(ConnectionInterface $con = null)
    {
        $database = new Database($con->getWrappedConnection());
        $database->insertSql(null, array(__DIR__ . '/Config/thelia.sql'));
    }


    // public function postDeactivation(ConnectionInterface $con = null, $deleteModuleData = false)
    public function destroy(ConnectionInterface $con = null, $deleteModuleData = false)
    {
        $database = new Database($con->getWrappedConnection());
        $database->insertSql(null, array(__DIR__ . '/Config/uninstall.sql'));

        parent::destroy($con, $deleteModuleData);
    }

    protected function trans($id, array $parameters = [], $locale = null)
    {
        if (null === $this->translator) {
            $this->translator = Translator::getInstance();
        }

        return $this->translator->trans($id, $parameters, Degressif::MESSAGE_DOMAIN, $locale);
    }
}
