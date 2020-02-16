<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Request as RequestDivorce;
use App\Form\RequestType;

use Dompdf\Dompdf;
use Dompdf\Options;

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
     * @Route("/formulario", name="form", methods={"GET","POST"})
     */
    public function formAction(Request $request)
    {
        $requestDivorce = new RequestDivorce();

        $form = $this->createForm(RequestType::class, $requestDivorce);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $request = $form->getData();

            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');

            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);

            // Retrieve the HTML generated in our twig file
            $html = $this->renderView('agreement/successForm.html.twig', [
                'request' => $request
            ]);

            // Load HTML to Dompdf
            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser (inline view)
            $dompdf->stream("convenio.pdf", [
                "Attachment" => true
            ]);
        }

        return $this->render('agreement/form.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/precio", name="price", methods={"GET"})
     */
    public function priceAction(Request $request){
        return $this->render('agreement/price.html.twig');
    }

    /**
     * @Route("/contacto", name="contact", methods={"GET"})
     */
    public function contactAction(Request $request){
        return $this->render('agreement/contact.html.twig');
    }
}