<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ArticleType;
use App\Entity\Article;

class FormController extends AbstractController
{
    /**
     * @Route("/form/new")
     */
    public function new(Request $request)
    {

    	$article = new Article();
    	
    	$article->setTitle('Les miserables');
 		$article->setContent('Le livre parle de cosette et jean valjean');
 		$article->setAuthor('Victor Hugo');
 		 

 		$form = $this->createForm(ArticleType::class, $article);

 		 $form->handleRequest($request); // verification des contraintes imposées (ex : min caractères pour le champs description, NotBlank (ne pas retourner vide)...)

   		 if ($form->isSubmitted() && $form->isValid()) { // si "submit" ET tout est valide
       		 dump($article); // alors afficher le contenu de l'objet $article sur la console
   		 }

      
        return $this->render('new.html.twig', ['monFormulaire' => $form->createView()]);

    }
}