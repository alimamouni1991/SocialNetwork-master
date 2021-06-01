<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Tag;
use App\Form\PostsSearchType;
use App\Form\PostType;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class HomeController
 * @package App\Controller
 */
class AdminPostController extends AbstractController
{



    /**
     * @Route("/admin/post", name="admin_posts_index")
     */
    public function index(PostRepository $repo)
    {
        return $this->render('admin/post/index.html.twig', [
            'posts' => $repo->findAll()
        ]);
    }

    /**
     * Permet d'afficher le formulaire d'edition
     *
     * @Route("/admin/post/{id}/edit", name="admin_posts_edit")
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post, Request $request,  EntityManagerInterface $entityManager ){
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($post);
            $entityManager->flush();

            $this->addFlash(
                'success',
                "l'annonce <strong>{$post->getContent()}</strong> a bien été enregistrée !"
            );
        }
        return $this->render('admin/post/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView()
        ]);
    }
}
