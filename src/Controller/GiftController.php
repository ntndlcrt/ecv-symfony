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
     * @Route("/gifts", name="gifts_index")
     */
    public function index(Request $request, GiftRepository $giftRepository)
    {
        $form = $this->createForm(GiftSuggestionsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $gifts = $giftRepository->findMatchingGifts($formData);

            return $this->render('pages/gifts/results.html.twig', [
                'gifts' => $gifts,
            ]);
        }

        return $this->render('pages/gifts/search.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
