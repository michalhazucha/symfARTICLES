<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkExtraBundle\Controller\Controller;


class ArticleController extends AbstractController
{
	/**
	 * @TODO
	 * jednoduchý kontroler a template- hardcoded data ako by to malo vyzerať
	 */

	/**
	 * @Route("/")
	 * @Method({"GET"})
	 */
	public function index(){

		$articles=['Heading 0','Heading2','Heading3'];
		return $this->render('articles/index.html.twig',array('articles'=>$articles));
	}
};

