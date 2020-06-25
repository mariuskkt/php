<?php


namespace App\Views;


class Page extends \App\Abstracts\Views\Page
{

    /**
     * Sets (overrides) title in head
     *
     * @param string $title
     */
    function setTitle(string $title): void
    {
        $this->data['head']['title'] = $title;
    }

    /**
     * Sets (overrides) content in data
     *
     * We can have more helper methods like set/add/delete for easier
     * use later. It's up to YOU.
     *
     * @param string $content_html
     */
    function setContent(string $content_html): void
    {
        $this->data['content'] = $content_html;
    }

    /**
     * @param string $string
     */
    function addContent(string $string): void
    {
        $this->data['content'] .= $string;
    }

    function addStyle(string $string): void
    {
        $this->data['head']['css'][] = $string;
    }
}