<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Request as RequestDivorce;
use App\Form\RequestType;

class AgreementController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('agreement/index.html.twig');
    }

    /**
     * @Route("/service", name="service", methods={"GET","POST"})
     */
    public function serviceAction(Request $request)
    {
        $requestDivorce = new RequestDivorce();

        $form = $this->createForm(RequestType::class, $requestDivorce);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($requestDivorce);
            $entityManager->flush();

            return $this->redirect($this->generateUrl('successForm'));
        }

        return $this->render('agreement/service.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/success", name="successForm", methods={"GET"})
     */
    public function successFormAction(Request $request){
        return $this->render('agreement/successForm.html.twig');
    }

    /**
     * @Route("/request/{id}", name="requestView", methods={"GET"})
     */
    public function requestViewAction(\App\Entity\Request $request){

        return $this->render('agreement/requestView.html.twig', array(
            'request' => $request
        ));
    }
}