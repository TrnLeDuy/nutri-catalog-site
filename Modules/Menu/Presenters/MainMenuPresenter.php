<?php

namespace Modules\Menu\Presenters;

use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Menu\MenuItem;
use Modules\Menu\Presenters\Presenter;

class MainMenuPresenter extends Presenter
{
    public function setLocale($item)
    {
        if (Str::startsWith($item->url, 'http')) {
            return;
        }
        if (LaravelLocalization::hideDefaultLocaleInURL() === false) {
            $item->url = locale() . '/' . preg_replace('%^/?' . locale() . '/%', '$1', $item->url);
        }
    }
    /**
     * {@inheritdoc }.
     */
    public function getOpenTagWrapper()
    {
        return PHP_EOL . '<ul class=" nav navbar-nav">' . PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getCloseTagWrapper()
    {
        return PHP_EOL . '</ul>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        $this->setLocale($item);

        return '<li ' . $this->getActiveState($item) . '><a class="full-radius" href="' . $item->getUrl() . '" ' . $item->getAttributes() . '>' . $item->getIcon() . ' ' . $item->title . '</a></li>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getActiveState($item, $state = 'class="active"')
    {   
        return $item->isActive() ? $state : null;
    }
}
