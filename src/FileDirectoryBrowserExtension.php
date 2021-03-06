<?php

namespace Bolt\Extension\Bolt\FileDirectoryBrowser;

use Bolt\Application;
use Bolt\Extension\SimpleExtension;

/**
 * Directory index extension loader.
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class FileDirectoryBrowserExtension extends SimpleExtension
{
    /**
     * {@inheritdoc}
     */
    public function getDisplayName()
    {
        return 'File & Directory Browser';
    }

    /**
     * {@inheritdoc}
     */
    protected function registerServices(Application $app)
    {
        $app['directory_index.config'] = $app->share(
            function () {
                return new Config\Config($this->getConfig());
            }
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function registerFrontendControllers()
    {
        return [
            '/' => new Controller\Index(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigPaths()
    {
        return [
            'templates' => ['namespace' => 'FileDirectoryBrowser'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultConfig()
    {
        return [
            'assets'    => [
                'moment_js'     => true,
                'font_awesome'  => true,
            ],
            'routes'    => [
            ],
            'templates' => [
                'parent'    => '@FileDirectoryBrowser/_default.twig',
                'index'     => '@FileDirectoryBrowser/index.twig',
                'header'    => '@FileDirectoryBrowser/_header.twig',
                'directory' => '@FileDirectoryBrowser/_directory.twig',
                'file'      => '@FileDirectoryBrowser/_file.twig',
            ],
        ];
    }
}
