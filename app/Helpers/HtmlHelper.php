<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use DOMDocument;

class HtmlHelper
{
    public static function generateTableOfContents($html)
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html);
        libxml_clear_errors();

        $toc = [];
        foreach (['h1', 'h2', 'h3'] as $tag) {
            foreach ($dom->getElementsByTagName($tag) as $el) {
                $text = trim($el->textContent);
                $id = Str::slug($text);
                $el->setAttribute('id', $id);
                $toc[] = [
                    'tag' => $tag,
                    'text' => $text,
                    'id' => $id,
                ];
            }
        }

        return [
            'content' => $dom->saveHTML($dom->getElementsByTagName('body')->item(0)),
            'toc' => $toc,
        ];
    }
}
