<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application\Controller;

use Application\Model\Demanda;
use Zend\Mvc\Controller\AbstractActionController;
use Application\Model\Assunto;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Application\Model\Solicitante;

class IndexController extends AbstractActionController
{
    /**
     * @var ContainerInterface
     */
    private $container;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;   
    }
    
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function processarAction()
    {
        $solicitante = new Solicitante($_POST);
        $assunto = new Assunto($_POST);
        
        /*$assunto = ($_POST['assunto'] ?? null);
        $detalhes = ($_POST['detalhes'] ?? null);*/
        
        $_SESSION['dados'] = [
            'solicitante' => $solicitante,
            'assunto' => $assunto
        ];
        
        
        if (empty($solicitante->cpf) || empty($assunto) || empty($detalhes)) {
            $_SESSION['mensagem'] = 'Preencha os campos!';
            return $this->redirect()->toRoute('application');
        }
        
        $solicitanteTable = $this->container->get('SolicitanteTable');  
        $solicitanteTable->persist($solicitante);

        $assuntoTable = $this->container->get('AssuntoTable');

        $result = $assuntoTable->getByAssunto($assunto->assunto);

        if ($result->count() > 0) {
            $_SESSION['dados']['detalhes_gravados'] = $result->current()['detalhes'];
            return $this->redirect()->toRounte('application');
        } else {
            $assuntoTable->persist($assunto);
        }

        $demanda = new Demanda($solicitante, $assunto);

        $demandaTable = $this->container->get('DemandaTable');
        $demandaTable->persist($demanda);

        $_SESSION['dados'] = [];

        return new ViewModel();
        
    }    
}