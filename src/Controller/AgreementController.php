<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PartnerType;
use App\Entity\Partner;

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
        $partner = new Partner();

        $form = $this->createForm(PartnerType::class, $partner);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partner);
            $entityManager->flush();
        }

        return $this->render('agreement/service.html.twig', array(
            'form' => $form->createView()
        ));
    }
}