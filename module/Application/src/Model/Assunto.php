<?php
/**
 * Created by PhpStorm.
 * User: evandro
 * Date: 13/04/2019
 * Time: 13:22
 */

namespace Application\Model;

class Assunto
{
    /**
     *  @var integer
     */
    public $codigo;

    /**
     *  @var string
     */
    public $assunto;

    /**
     * @var string
     */
    public $detalhes;

    /**
     * 
     *  @param array $data
     */
    public function __construct(array $data)
    {
        $this->codigo = $data['codigo'] ?? null;
        $this->assunto = $data['assunto'] ?? null;
        $this->detalhe = $data['detalhe'] ?? null;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}