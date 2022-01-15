<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class SuccessHeaderComponent extends Component
{
    /**
     * Массив ссылок в хэдере
     * @var array $links
     */
    public array $links = [];

    /**
     * Имя текущего роута
     * @var string|null $routeName
     */
    public string|null $routeName;

    /**
     * Условие, по которым ищутся ссылки нужные для хэдера
     * @var string $regexLinksUri
     */
    public string $regexLinksUri;

    /**
     * Состояние хэдера, меняет стили ['success', 'failed']
     * @var string $status
     */
    public string $status = 'success';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $status = 'success', array $links = [], string $regexLinksUri = '/^cookie+(?=\\/|)/')
    {
        $this->status = $status;
        $this->links = $links;
        $this->regexLinksUri = $regexLinksUri;
        $this->routeName = Route::currentRouteName();
        $this->getLinks();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.cookie-header');
    }

    private function getLinks()
    {
        if (empty($this->links)) {
            collect(Route::getRoutes())->map(function ($route) {
                if (preg_match($this->regexLinksUri, $uri = $route->uri())) {
                    $this->links[$route->getName()] = [
                        'uri' => $uri,
                        'langName' => __("header.{$route->getName()}"),
                        'selected' => $this->routeName === $route->getName()
                    ];
                }
            });
        }
    }
}
