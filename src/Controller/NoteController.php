<?php

namespace App\Controller;

use App\Entity\Note;
use App\Repository\NoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/note')]
class NoteController extends AbstractController
{
    #[Route('/', name: 'app_note')]
    public function index(NoteRepository $noteRepository): Response
    {
        return $this->render('note/index.html.twig', [
            'notes' => $noteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'note_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $note = new Note();

        if ($request->isMethod('POST') &&
            $this->isCsrfTokenValid('create_note', $request->request->get('_token'))) {

            $note->setTitle($request->request->get('title'));
            $note->setContent($request->request->get('content'));
            $note->setStatut('publié');

            $em->persist($note);
            $em->flush();

            return $this->redirectToRoute('app_note');
        }

        return $this->render('note/new.html.twig');
    }

    #[Route('/{id}', name: 'note_show')]
    public function show(Note $note): Response
    {
        return $this->render('note/show.html.twig', [
            'note' => $note,
        ]);
    }
}