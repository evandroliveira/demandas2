<?php
namespace Application\Model;
class Solicitante
{
    /**
     *
     * @var string
     */
    public $cpf;

    /**
     *
     * @var string
     */
    public $nome;

    /**
     *
     * @var string
     */
    public $cep;

    /**
     *
     * @var string
     */
    public $municipio;

    /**
     *
     * @var string
     */
    public $uf;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $ddd;

    /**
     *
     * @var string
     */
    public $telefone;

    /**
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->cpf = $data['cpf'] ?? null;
        $this->nome = $data['nome'] ?? null;
        $this->cep = $data['cep'] ?? null;
        $this->municipio = $data['municipio'] ?? null;
        $this->uf = $data['uf'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->ddd = $data['ddd'] ?? null;
        $this->telefone = $data['telefone'] ?? null;
    }

    /**
     *
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}