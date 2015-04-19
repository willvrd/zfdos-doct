<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PruebasController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function verProductoAction(){
         
        //Recogemos el valor de la ruta
        $id=$this->params()->fromRoute("id",null);
        //Le podemos indicar el tipo de dato que va a ser
       // $id=(int)$this->params()->fromRoute("id",null);
        
        $nombre="Producto número: ".$id;

        return new ViewModel(array("nombre"=>$nombre));
    }
    
     public function verProductoDosAction(){
        $view=new ViewModel();
        //Indicamos que layout va a utilizar este método
        $this->layout('layout/pruebas');

        //Le pasamos un parámetro
        $this->layout()->saludo="Hola como estas";
        //Establecemos el titulo de la página
        $this->layout()->title="Soy el titulo de una plantilla";

        //Renderizamos la vista
        return $view; 
    }

    public function verAjaxAction(){

       $view=new ViewModel();

       //Recibimos datos sin estilos, ideal cuando usemos ajax
       $view->setTerminal(true);

       return $view;
    }
    
    public function redirAction(){

    /*
     * Refrescar la pagina
     * return $this->redirect()->refresh();
     */

    /*
     * Redirigir a una ruta que tengamos definida en module.config.php
     * return $this->redirect()->toRoute("home");
     */

    /*
     * Redirigir a una url
     * obtenemos la url base y le indicamos donde ir
     */

        return $this->redirect()->toUrl(
                  $this->getRequest()->getBaseUrl().'/application/pruebas/index'
        );
    }



    
   
}
