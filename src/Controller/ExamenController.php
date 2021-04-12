<?php

namespace App\Controller;

use App\Entity\Examen;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Form\ExamenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/examen")
 */
class ExamenController extends AbstractController
{
    /**
     * @Route("/", name="examen_index", methods={"GET"})
     */
    public function index(): Response
    {
        $examens = $this->getDoctrine()
            ->getRepository(Examen::class)
            ->findAll();

        return $this->render('examen/index.html.twig', [
            'examens' => $examens,
        ]);
    }

    /**
     * @Route("/admin/examen", name="examen_index1", methods={"GET"})
     */
    public function index1(): Response
    {
        $examens = $this->getDoctrine()
            ->getRepository(Examen::class)
            ->findAll();

        return $this->render('examen/index1.html.twig', [
            'examens' => $examens,
        ]);
    }

    /**
     * @Route("/passer/{id}" , name="passer")
     */
    public function passer($id){
        $examens = $this->getDoctrine()->getRepository(Examen::class)->findBy(['formationId' =>$id]);
        return $this->render("examen/index.html.twig",[
            'examens' =>$examens
        ]);
    }

    /**
     * @Route("/passer/qcm/{id}" , name="qcm")
     */
    public function qcm(Examen $examen){
        $questions = $examen->getQuestion();
        
        
        $reponses = $this->getDoctrine()->getRepository(Reponse::class)->findAll();
        
        return $this->render("examen/passer.html.twig",[
            'questions' => $questions,
            'reponses' => $reponses,
            'i' => 1
        ]);
    }
    /**
     * @Route("/new", name="examen_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $examan = new Examen();
        $form = $this->createForm(ExamenType::class, $examan);
        $form->handleRequest($request);
        $questions = $this->getDoctrine()->getRepository(Question::class)->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            
                for ($i=0; $i < count($questions); $i++) { 
                    $x = $request->request->get($i);
                    if($x != "")
                        $this->getDoctrine()->getRepository(Question::class)->findOneBy(['id' => $x])->addExaman($examan);
                        
                }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($examan);
            $entityManager->flush();

            return $this->redirectToRoute('examen_index');
        }

        return $this->render('examen/new.html.twig', [
            'examan' => $examan,
            'form' => $form->createView(),
            'questions' => $questions,
            'i' => 0
        ]);
    }

    /**
     * @Route("/{id}", name="examen_show", methods={"GET"})
     */
    public function show(Examen $examan): Response
    {
        return $this->render('examen/show.html.twig', [
            'examan' => $examan,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="examen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Examen $examan): Response
    {
        $form = $this->createForm(ExamenType::class, $examan);
        $form->handleRequest($request);
        $formations = $this->getDoctrine()->getRepository(Question::class)->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('examen_index');
        }

        return $this->render('examen/edit.html.twig', [
            'examan' => $examan,
            'form' => $form->createView(),
            'formation' => $formations
        ]);
    }

    /**
     * @Route("/{id}", name="examen_delete", methods={"POST"})
     */
    public function delete(Request $request, Examen $examan): Response
    {
        if ($this->isCsrfTokenValid('delete' . $examan->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($examan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('examen_index');
    }
}
