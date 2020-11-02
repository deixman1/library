<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Books;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\BooksRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;

class BooksController extends AbstractController
{
    private function getForm($books)
    {
        return $this->createFormBuilder($books)
            ->setMethod('GET')
            ->add('name', TextType::class, ['label' => 'Название книги'])
            ->add('author', TextType::class, ['label' => 'Автор книги'])
            ->add('year_published', IntegerType::class, ['label' => 'Год издания книги'])
            ->getForm();
    }

    /**
     * @Route("/add_book", name="add_book")
     * @param Request $request
     * @return Response
     */
    public function addBook(Request $request): Response
    {
        $book = new Books;
        $form = $this->getForm($book);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($book);

            $entityManager->flush();

            return $this->render('books/add_book.html.twig', [
                'form' => $form->createView(),
                'error' => "Книга добавлена"
            ]);
        }
        return $this->render('books/add_book.html.twig', [
            'form' => $form->createView(),
            'error' => ""
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
        $form = $this->getForm($book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $book->setName($data->getName());
            $book->setAuthor($data->getAuthor());
            $book->setYearPublished($data->getYearPublished());
            $entityManager->flush();
            return $this->render('books/add_book.html.twig', [
                'form' => $form->createView(),
                'error' => "Книга изменена"
            ]);
        }
        return $this->render('books/add_book.html.twig', [
            'form' => $form->createView(),
            'error' => ""
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
