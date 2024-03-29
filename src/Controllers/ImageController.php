<?php

namespace App\Controllers;

use App\Repository\ImageRepository;
use Framework\Services\NotFoundHttpException;
use Framework\Services\RenderTemplateService;
use Framework\Services\Template;
use Framework\Services\Widgets\GetFormWidget;
use Framework\Services\Widgets\NavigationWidget;
use Framework\Services\Widgets\TableWidget;
use Symfony\Component\HttpFoundation\Response;

class ImageController
{

    private ImageRepository $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function showAll(): Response
    {
        $repository = $this->imageRepository;
        if ($page = filter_input(INPUT_GET, 'page')) {
            $images = $repository->fetchAll($page);
        } else {
            $images = $repository->fetchAll();
        }

        $navigationWidget = (new NavigationWidget('navigation_bootstrap'))->getTemplate();
        $getFormWidget = (new GetFormWidget('form_get'))->getTemplate();
        $tableWidget = (
        new TableWidget(
            'table_image_dashboard_bootstrap',
            ['Id', 'Name', 'Image'],
            ['images' => $images],
        )
        )->getTemplate();
        $content = new Template('show_widgets_images', 'content');
        $layout = new Template('main', 'layouts');

        $view = (new RenderTemplateService([$layout, $content, $tableWidget, $getFormWidget, $navigationWidget]))->renderFromListTemplates();

        return (new Response($view))->send();
    }

    public function showByForeignKey(array $foregnKey): Response
    {
        $foregnKey = $foregnKey['foreignKey'];
        $repository = $this->imageRepository;
        // @TODO доработать универсальность исключения NotFoundHttpException
        $images = $repository->findByForeignKey($foregnKey) ?? throw new NotFoundHttpException("Not found images ID $foregnKey");

        // @TODO разобраться с пагинацией
        $navigationWidget = (new NavigationWidget('w_navigation_bootstrap'))->getTemplate();
        $getFormWidget = (new GetFormWidget('w_form_get_bootstrap'))->getTemplate();

        $content = new Template('c_album_images_bootstrap', 'content', ['images' => $images]);
        $layout = new Template('l_main_page_dashboard_bootstrap', 'layouts');

        $view = (new RenderTemplateService([$layout, $content, $getFormWidget, $navigationWidget]))->renderFromListTemplates();

        return (new Response($view))->send();
    }


}