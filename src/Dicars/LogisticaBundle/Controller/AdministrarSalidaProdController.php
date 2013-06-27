<?php
namespace Dicars\LogisticaBundle\Controller;

use Dicars\DataBundle\Entity\LogDetsalprod;

use Dicars\DataBundle\Entity\LogSalprod;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\TransactionRequiredException;

class AdministrarSalidaProdController extends Controller{
	
	public function RegistrarSalidaProdAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
		$otherdata = $request->request->get('otherdata');
	
		$datos = array();
		parse_str($form,$datos);
	
		$Registrante = null;
		$Local = null;
		$Serie = null;
		$Numero = null;
		$Fecha_reg = null;
		$Motivo = null;
		$Solicitante = null;
		$Observacion = null;
	
		if ($form != null){
			
			$Registrante = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId' => 1));
			
			$Local = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Local')
			->findOneBy(array('nlocalId' => 1));
			
			$Serie ='qwer';
			$Numero ='12345678';
				
			$Fecha_reg = date_create_from_format('d/m/Y', $datos["fecha"]);
			
			$Motivo = $datos['motivo'];
				
			$Observacion = $datos['observaciones'];
				
			$SalProd = new  LogSalprod();
			$SalProd -> setNpersonal($Registrante);
			$SalProd -> setNlocal($Local);
			$SalProd -> setCsalprodserie($Serie);
			$SalProd -> setCsalprodnro($Numero);
			$SalProd -> setDsalprodfecreg($Fecha_reg);
			$SalProd -> setNsalprodmotivo($Motivo);
			$SalProd -> setNsolicitanteId($datos['solicitante_id']);
			$SalProd -> setCsalprodobsv($Observacion);
				
			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();
			try {
				$em->persist($SalProd);
				$em->flush();
	
				foreach($otherdata as $key => $data){
					$Producto = $this->getDoctrine()
					->getRepository('DicarsDataBundle:Producto')
					->findOneBy(array('nproductoId' => $data['id']));
						
					$DetalleSalProd = new LogDetsalprod();
					$DetalleSalProd -> setNsalprod($SalProd);
					$DetalleSalProd -> setNproducto($Producto);
					$DetalleSalProd -> setDetsalprodcant($data['cantidad']);
					$DetalleSalProd -> setCdetsalprodest('1');
					
					$em->persist($DetalleSalProd);
					$em->flush();
				}
	
			} catch (Exception $e) {
				$this->getDoctrine()->getEntityManager()->rollback();
				$this->getDoctrine()->getEntityManager()->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");
					
				throw $e;
			}
			$this->getDoctrine()->getEntityManager()->commit();
			$em->clear();
			$return = array("responseCode"=>200, "datos"=>$data);
	
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}