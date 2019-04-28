<?php
/**
 * Created by PhpStorm.
 * User: evand
 * Date: 13/04/2019
 * Time: 14:04
 */

namespace Application\Model;

use Interop\Container\ContainerInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

class SolicitanteTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // TODO: Implement __invoke() method.
        $adapter = $container->get('DBAdapter');
        $tableGateway = new TableGateway('solicitante', $adapter);
        return new SolicitanteTable($tableGateway);
    }
}