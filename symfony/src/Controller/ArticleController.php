<?php

namespace App\Controller;
use App\Form\ArticleType;
use DateTime;
use App\Entity\Article;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkExtraBundle\Controller\Controller;
//use Symfony\Component\Validator\Constraints\DateTime;



class ArticleController extends AbstractController
{
	/**
	 * @Route("/",name="article_list")
	 * @Method({"GET"})
	 */
	public function index(){
		$articles=$this->getDoctrine()->getRepository(Article::class )->findAll();
		return $this->render('articles/index.html.twig',array('articles'=>$articles));
	}



	/**
	 * @Route("/article/new",name="new_article")
	 * @Method({"GET","POST"})
	 */
	public function create(Request $request ) {
		$article=new Article();
		$article->setCreatedAt(new DateTime());
		$form = $this->createForm(ArticleType::class, $article);
		$form->handleRequest($request);
		if($form->isSubmitted()&& $form->isValid()){
			$article= $form->getData();
			$entityManager=$this->getDoctrine()->getManager();
			$entityManager->persist($article);
			$entityManager->flush($article);

			return $this->redirectToRoute('article_list');
		}

		return $this->render('articles/new.html.twig',array('form'=>$form->createView()));

	}
	/**
	 * @Route("/article/{id}", name="article_show")
	 */
	//Fetch article from database
	public function show($id) {
		$article = $this->getDoctrine()->getRepository(Article::class)->find($id);
		return $this->render('articles/article.html.twig', array('article' => $article));
	}

	/**
	 * @Route("/article/edit/{id}",name="edit_article")
	 * @Method({"GET","POST"})
	 */
	public function edit(Request $request,$id ) {
		$article=new Article();
		$article=$this->getDoctrine()->getRepository(Article::class)->find($id);

		$form = $this->createForm(ArticleType::class, $article);
		$form->handleRequest($request);

		if($form->isSubmitted()&& $form->isValid()){
			$entityManager=$this->getDoctrine()->getManager();
			$entityManager->flush($article);

			return $this->redirectToRoute('article_list');
		}

		return $this->render('articles/edit.html.twig',array('form'=>$form->createView()));

	}

	/**
	 * @Route("/article/delete/{id}",name="delete")
	 * @Method({"delete"})
	 */
	public function delete(Request $request,$id ) {
		$article = $this->getDoctrine()->getRepository(Article::class)->find($id);
		$this->getDoctrine()->getManager()->remove($article);
		$this->getDoctrine()->getManager()->flush();
		return $this->redirectToRoute('article_list');
	}


};

