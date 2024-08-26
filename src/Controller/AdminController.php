<?php

namespace App\Controller;

use App\Entity\Zombie;
use App\Form\ZombieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_panel')]
    public function admin(EntityManagerInterface $entityManager): Response
    {
        $zombies = $entityManager->getRepository(Zombie::class)->findAll();

        return $this->render('admin/admin.html.twig', [
            'zombies' => $zombies,
        ]);
    }

    #[Route('/admin/edit/{id}', name: 'edit_zombie')]
    public function editZombie(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $zombie = $entityManager->getRepository(Zombie::class)->find($id);
    
        if (!$zombie) {
            throw $this->createNotFoundException('Zombie not found.');
        }
    
        $form = $this->createForm(ZombieType::class, $zombie);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
        
            $this->addFlash('success', 'Zombie updated successfully!');
        
            return $this->redirectToRoute('admin_panel');
        }
    
        return $this->render('admin/zombie_edit.html.twig', [
            'form' => $form->createView(),
            'zombie' => $zombie,
        ]);
    }

    #[Route('/admin/delete/{id}', name: 'delete_zombie', methods: ['POST'])]
    public function deleteZombie(Zombie $zombie, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($zombie);
        $entityManager->flush();

        $this->addFlash('success', 'Zombie deleted successfully!');

        return $this->redirectToRoute('admin_panel');
    }
}