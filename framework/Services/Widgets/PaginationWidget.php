<?php

namespace Framework\Services\Widgets;

use Framework\Services\Helpers\LinkManager;
use Framework\Services\RenderTemplateService;
use Framework\Services\RenderViewService;
use Framework\Services\Template;


/**
 * @todo может соеденить пагинацию с таблицей
 */
class PaginationWidget implements WidgetInterface
{
    private string $templateName;
    private string $divider = 'page';

    // @TODO подумать как пробрасывать пустой массив в LinkManager
    private array $filter = ['filter'];
    private int $totalCount;
    private int $sampleLimit;

    public function __construct(string $templateName, $totalCount, array $sampleLimit = ['sampleLimit' => 2])
    {
        $this->templateName = $templateName;
        $this->totalCount = $totalCount['totalCount'];
        $this->sampleLimit = $sampleLimit['sampleLimit'];
    }

    public function __toString()
    {
        return (new RenderTemplateService([$this->getTemplate()]))->renderFromListTemplates();
    }

    public function setDivider(string $divider): self
    {
        $this->divider = $divider;
        return $this;
    }

    public function setFilter(array $filter): self
    {
        $this->filter = $filter;
        return $this;
    }

    private function count(): float
    {
        return ceil($this->totalCount / $this->sampleLimit);
    }

    /**
     * returns an array of rendered links with each page number
     */
    private function create(): array
    {
        $pagination = [];
        // @TODO внимательно изучить работу цикла
        for ($i = 1; $i <= $this->count(); $i++) {
            $link = "<a href=\"{link}\" class=\"{class}\">{number}</a>";
            $replace['{link}'] = LinkManager::link(null, [$this->divider => $i], $this->filter);
            $replace['{class}'] = 'page-link';
            $replace['{number}'] = $i;
            $link = strtr($link, $replace);
            $pagination[] = $link;
        }

        // for ($i = 1; $i <= $this->count(); $i++) {
        //   $link = LinkManager::link('/show', [$this->divider => $i], $this->filter);
        //   $storageLinks[] = "<a href=\"${link}\">${i}</a>";
        // }
        return $pagination;
    }

    public function getTemplate(): Template
    {
        return new Template($this->templateName, 'widgets', ['pagination' => $this->create()]);
    }

    /** @deprecated */
    public function render(): RenderViewService
    {
        return new RenderViewService(
            ['widgets' => 'pagination_object'],
            [
                'pagination' => $this->create(),
            ]
        );
    }


}