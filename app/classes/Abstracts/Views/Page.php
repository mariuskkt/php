<?php

namespace App\Abstracts\Views;

use Core\View;

/**
 * Class Page
 *
 * @package App\Abstracts\Views\Page
 * @author  Dainius Vaičiulis   <denncath@gmail.com>
 */
abstract class Page extends View
{
    public function __construct(array $page = [])
    {
        $default = [
            'head' => [
                'title' => 'PHP ZJBZ',
                'css' => ['assets/css/style.css'],
                'js' => ['/assets/js/app.js']
            ],
            'header' => (new \App\Views\Nav())->render(),
            'content' => 'Demo Page',
            'footer' => (new \App\Views\Footer())->render()
        ];

        // Adds $default and $page arrays
        $this->data = $page + $default;
    }

    /**
     * Sets (overrides) title in head
     *
     * @param string $title
     */
    abstract function setTitle(string $title): void;

    /**
     * Sets (overrides) content in data
     *
     * We can have more helper methods like set/add/delete for easier
     * use later. It's up to YOU.
     *
     * @param string $content_html
     */
    abstract function setContent(string $content_html): void;


    public function render(string $template_path = ROOT . '/app/templates/page.tpl.php')
    {
        return parent::render($template_path);
    }
}
