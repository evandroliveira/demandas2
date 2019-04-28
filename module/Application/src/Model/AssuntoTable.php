<?php
/**
 * Created by PhpStorm.
 * User: evand
 * Date: 13/04/2019
 * Time: 15:02
 */

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Select;
use Application\Model\Assunto;
use Zend\Db\Sql\Predicate\Expression;

class AssuntoTable
{
    /**
     * @var TableGatewayInterface
     */
    private $tableGateware;

    /**
     * @param TableGatewayInterface $tableGateway
     */
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateware = $tableGateway;
    }

    /**
     * @param Assunto $assunto
     */
    public function persist(Assunto $assunto)
    {
        $set = $assunto->toArray();
        $result = $this->tableGateware->select(['assunto' => $set['assunto']]);

        if ($result->count() == 0) {
            $this->tableGateware->insert($set);
            $assunto->codigo = $this->getMaxCodigo();
        }
    }

    /**
     * 
     * @param string $assunto
     * @return ResultSet
     */
    public function getByAssunto($assunto)
    {
        return $this->tableGateware->select(['assunto' => $assunto]);
    }

    /**
     * 
     * @return integer
     */
    public function getMaxCodigo()
    {
        $expression = new Expression('max(codigo)');

        $select = new Select('assunto');
        $select->columns(['codigoAssunto' => $expression]);
        return $this->tableGateware->selectWith($select);
    }
}