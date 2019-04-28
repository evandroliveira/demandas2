<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;

class DemandaTable
{
     /**
     *
     * @var TableGatewayInterface
     */
    private $tableGateway;

    /**
     *
     * @param TableGatewayInterface $tableGateway
     */
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     *
     * @param Demanda $demanda
     */
    public function persist(Demanda $demanda)
    {
        $set = $demanda->toArray();
        try {
            $this->tableGateway->insert($set);
        } catch (\Exception $e) {}
    }

    /**
     *
     * @param string $assunto
     * @return ResultSet
     */
    public function getByAssunto($assunto)
    {
        return $this->tableGateway->select([
            'assunto' => $assunto
        ]);
    }

    /**
     *
     * @return integer
     */
    public function getMaxCodigo()
    {
        $expression = new Expression('max(codigo)');

        $select = new Select('assunto');
        $select->columns([
            'codigoAssunto' => $expression
        ]);
        return $this->tableGateway->selectWith($select)->current()['codigoAssunto'];
    }
}