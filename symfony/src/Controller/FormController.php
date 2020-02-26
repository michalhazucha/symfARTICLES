<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class FormController extends AbstractController
{
	/**
	 * @Route("/form", name="form")
	 */
	public function index()
	{
		$article = new Article();
		$form = $this->createForm(ArticleType::class, $article);

		return $this->render('articles/new.html.twig', [
			'controller_name' => 'FormController',
			'article_form' => $form->createView()
		]);
	}
}
