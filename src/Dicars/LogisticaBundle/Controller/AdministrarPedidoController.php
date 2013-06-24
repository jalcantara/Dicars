<?php
namespace Dicars\LogisticaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarPedidoController extends Controller{
	
	public function RegistrarPedidoAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		
		$datos = array();
		parse_str($form,$datos);
		
		if ($form != null){
			/*
				
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Producto);
				$em->flush();
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();*/
			$return = array("responseCode"=>200, "datos"=>$datos);
				
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
		}

}
