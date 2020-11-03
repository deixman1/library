<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Books;
use Symfony\Component\HttpFoundation\Request;
use App\Form\BooksType;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class BooksController extends AbstractController
{
    /**
     * @Route("/add_book", name="add_book")
     * @param Request $request
     * @return Response
     */
    public function addBook(Request $request): Response
    {
        $book = new Books();
        $form = $this->createForm(BooksType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($book);

            $entityManager->flush();

            return $this->render('books/add_book.html.twig', [
                'form' => $form->createView(),
                'success' => "Книга добавлена"
            ]);
        }
        return $this->render('books/add_book.html.twig', [
            'form' => $form->createView(),
            'success' => ""
        ]);

    }

    /**
     * @Route("/edit/{id}", name="edit_book")
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function editBook(int $id, Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $book = $entityManager->getRepository(Books::class)->find($id);
        $form = $this->createForm(BooksType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager->flush();
            return $this->render('books/add_book.html.twig', [
                'form' => $form->createView(),
                'success' => "Книга изменена"
            ]);
        }
        return $this->render('books/add_book.html.twig', [
            'form' => $form->createView(),
            'success' => ""
        ]);
    }
    /**
     * @Route("/", name="books_show")
     */
    public function index(): Response
    {
        $books = $this->getDoctrine()
            ->getRepository(Books::class)
            ->findAll( );
        return $this->render('books/index.html.twig', [
            'books' => $books,
        ]);
    }
}
