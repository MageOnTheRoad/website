<?php

declare(strict_types=1);

namespace CmsBundle\Controller;

use CmsBundle\Block\CmsAboutView;
use CmsBundle\Block\DynamicView;
use CmsBundle\Block\CmsHomeView;
use CmsBundle\Block\CmsView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CmsController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function view(CmsHomeView $block): Response
    {
        return $this->render('@Cms/home.html.twig', ['block' => $block]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function talks(CmsAboutView $block): Response
    {
        return $this->render('@Cms/about.html.twig', ['block' => $block]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(CmsView $block): Response
    {
        return $this->render('@Cms/contact.html.twig', ['block' => $block]);
    }

    /**
     * @Route("/error", name="error")
     */
    public function error(CmsView $block): Response
    {
        return $this->render('@Cms/error.html.twig', ['block' => $block]);
    }

    public function dynamicView(DynamicView $block, string $twigTemplate): Response
    {
        return $this->render('@Cms/content/' . $twigTemplate, ['block' => $block]);
    }
}
