<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/admin/user/list", name="user_list")
     */
    public function getList(UserRepository $userRepo)
    {
        $users = $userRepo->findAll();
        return $this->render('admin/user_list.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/admin/user/details/{id}", name="user_detail")
     */
    public function details(User $user)
    {
        return $this->render('admin/user_detail.html.twig', [
            'user' => $user
        ]);
    }
}
