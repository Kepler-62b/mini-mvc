<?php

namespace App\Service\Widgets;

use App\Service\ViewRenderService;

class NavigationWidget implements WidgetInterface
{

  public function __construct()
  {
  }

  public function render(): ViewRenderService
  {
    return new ViewRenderService(['widgets' => 'navigation']);
  }

}