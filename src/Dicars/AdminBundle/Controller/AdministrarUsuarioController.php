<?php
namespace Dicars\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarUsuarioController  extends Controller{

	public function RegistrarUsuarioAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Usuario_trabajador = null;
		$Usuario_id = null;
		$Usuario_clave = null;
		$Usuario_estado = null;
		$Usuario_fechareg = null;
	
		if ($form!=null){
			$Usuario_trabajador = $datos["trabajador"];
			$Usuario_id = $datos["usuario_id"];
			$Usuario_clave = $datos["contrasena"];
			$Usuario_estado = "A";
			$Usuario_fechareg = new \DateTime($datos["fecha"]);	
	
			$Usuario = new Usuario();
			$Usuario->setNpersonal($Usuario_trabajador);
			$Usuario->setCusuarioid($Usuario_id);
			$Usuario->setCusuarioclave($Usuario_clave);
			$Usuario->setCusuarioest($Usuario_estado);
			$Usuario->setCusuariofecreg($Usuario_fechareg);
	
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($Usuario);
				$em->flush();
			} catch (Exception $e){
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();
			$return = array("responseCode"=>200, "datos"=>$datos);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
}