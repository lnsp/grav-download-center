<?php
namespace Grav\Plugin;
use Grav\Common\Plugin;
use Grav\Common\Page\Page;

class DownloadCenterPlugin extends Plugin {
    protected $route;

    public static function getSubscribedEvents() {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
        ];
    }
    public function onPluginsInitialized() {
        /** @var Uri $uri */
        $uri =$this->grav['uri'];
        $route = $this->config->get('plugins.random.route');

        $this->enable([
            'onPageInitialized' => ['onPageInitialized', 0],
        ]);
    }
    public function onPageInitialized() {
        $examplePage = new Page;
        echo(__DIR__ + '/pages/download.md');
        $examplePage->init(new \SplFileInfo(__DIR__ + '/pages/download.md'));
        $examplePage->slug(basename($this->route));
        unset($this->grav['page']);
        $this->grav['page'] = $examplePage;
    }
}

 ?>
