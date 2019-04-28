<?php
/**
 * Created by PhpStorm.
 * User: evand
 * Date: 13/04/2019
 * Time: 13:23
 */

namespace Application\Model;

class Demanda
{
    /**
     * @var integer
     */
    public $codigo;
    /**
     * @var Assunto
     */
    public $assunto;

    /**
     * @var Solicitante
     */
    public $solicitante;

    /**
     * @param Solicitante $solicitante
     * @param Assunto $assunto
     */
    public function __construct(Solicitante $solicitante, Assunto $assunto)
    {
        $this->solicitante = $solicitante;
        $this->assunto = $assunto;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'codigo_solicitante' => $this->solicitante->cpf,
            'codigo_assunto' => $this->assunto->codigo
        ];
    }
}