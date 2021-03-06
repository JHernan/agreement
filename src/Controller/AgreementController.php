<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Util\Email;
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
     * @Route("/sobre-nosotros", name="about_us", methods={"GET"})
     */
    public function aboutUsAction(Request $request){
        return $this->render('agreement/about-us.html.twig');
    }

    /**
     * @Route("/contacto", name="contact", methods={"GET", "POST"})
     */
    public function contactAction(Request $request, \Swift_Mailer $mailer){
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = (new \Swift_Message('ConvenioDivorcio.com - ' . $form->getData()['subject']))
                ->setFrom($this->getParameter('mailer_from'))
                ->setTo($this->getParameter('mailer_to'))
                ->setBcc($this->getParameter('mailer_bcc'))
                ->setBody(
                    $this->renderView(
                        'email/contact_email.html.twig', [
                            'name' => $form->getData()['name'],
                            'email' => $form->getData()['email'],
                            'phone' => $form->getData()['phone'],
                            'subject' => $form->getData()['subject'],
                            'message' => $form->getData()['message']
                        ]
                    ),
                    'text/html'
                )
            ;

            $mailer->send($message);

            return $this->redirectToRoute('contact_send');
        }

        return $this->render('agreement/contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/contacto-enviado", name="contact_send", methods={"GET"})
     */
    public function contactSendAction(Request $request){
        return $this->render('agreement/contact_success.html.twig');
    }

    /**
     * @Route("/politica-de-cookies", name="cookies", methods={"GET"})
     */
    public function cookiesAction(Request $request){
        return $this->render('agreement/cookies.html.twig');
    }
}
