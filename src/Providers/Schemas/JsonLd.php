<?php

namespace Embed\Providers\Schemas;

/**
 * JsonLd provider.
 *
 * Load the json-ld data of an url and store it
 */
class JsonLd implements SchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getData(\DOMDocument $html)
    {
        $data = [];

        foreach ($html->getElementsByTagName('script') as $script) {
            if ($script->hasAttribute('type') && strtolower($script->getAttribute('type')) === 'application/ld+json') {
                $value = trim($script->nodeValue);

                if (empty($value)) {
                    continue;
                }

                try {
                    $data[] = json_decode($value, true);
                } catch (\Exception $exception) {
                    continue;
                }
            }
        }

        return $data;
    }
}
