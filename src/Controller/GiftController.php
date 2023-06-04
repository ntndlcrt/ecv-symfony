<?php

namespace App\Controller;

use App\Form\GiftSuggestionsType;
use App\Repository\GiftRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GiftController extends AbstractController
{
    /**
     * @Route("/gifts/search", name="gifts_search")
     */
    public function search(Request $request, GiftRepository $giftRepository)
    {
        $form = $this->createForm(GiftSuggestionsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Sort the gifts based on the form submission
            $gifts = $giftRepository->findMatchingGifts($data);

            // Redirect to the index page with the sorted gifts
            return $this->redirectToRoute('gifts_index', ['gifts' => $gifts]);
        }

        return $this->render('gifts/search.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/gifts", name="gifts_index")
     */
    public function index(GiftRepository $giftRepository)
    {
        $gifts = $giftRepository->findAll();

        return $this->render('gifts/index.html.twig', [
            'gifts' => $gifts,
        ]);
    }
}
