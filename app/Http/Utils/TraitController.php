<?php

namespace App\Http\Utils;

/**
 * Description of BaseController
 *
 * @author nina
 */
trait TraitController {
    
   
/**
     * Funcion general declara coneccion a BD
     */
    protected function getEm() {
        
        
        
        $this->em = $this->getDoctrine()->getManager();
        //$this->em->clear(); // Causaba error
        $this->req = Request::createFromGlobals();
        $this->logger = $this->get('logger');
//        $this->session=$this->req->getSession();
        $this->session=$this->get('session');
//        $this->fb = $fb = $this->container->get('fb');
        $this->user = $this->get('security.token_storage')->getToken()->getUser();
        //$this->conectaBD();
    }
    /**
     * Funcion que conecta a BD
     */
     private function conectaBD() {
        $this->q = new BDpgsql();
        define('DB_HOST', $this->getParameter('database_host'));
        define('DB_NAME', $this->getParameter('database_name'));
        define('DB_USER', $this->getParameter('database_user'));
        define('DB_PASSWORD', $this->getParameter('database_password'));
        $this->q->conectar(DB_NAME, DB_HOST, DB_USER, DB_PASSWORD);
    }
}
