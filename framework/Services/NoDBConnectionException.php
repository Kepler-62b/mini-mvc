<?php

namespace Framework\Services;

use Framework\Services\Widgets\GetFormWidget;
use Framework\Services\Widgets\NavigationWidget;
use Symfony\Component\HttpFoundation\Response;

class NoDBConnectionException extends \Exception
{
    private ?string $params;

    /**
     * @TODO передавать параметры массивом
     */
    public function __construct(string $message, string $params = null)
    {
        parent::__construct($message . ' ' . $params);
        $this->params = $params;
        $this->noConnection();
    }

    /** @TODO настраивать надпись в шаблоне */
    public function noConnection(): Response
    {
        // @TODO подумать, куда это убрать (в отдельный класс с конфигами?) или устанавливать константой
        ini_set('display_errors', 'Off');

        $navigationWidget = (new NavigationWidget('w_navigation_bootstrap'))->getTemplate();
        $getFormWidget = (new GetFormWidget('w_form_get_bootstrap'))->getTemplate();

        $contentException = new Template('ce_no_db_connection', 'content/exceptions');
        $layout = new Template('l_main_page_dashboard_bootstrap', 'layouts');

        $view = (new RenderTemplateService([$layout, $contentException, $getFormWidget, $navigationWidget]))->renderFromListTemplates();

        return (new Response())
            ->setContent($view)
            ->setStatusCode(Response::HTTP_NOT_FOUND)
            ->send();
    }
}