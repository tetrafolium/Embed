<?php

namespace Embed\Providers\Schemas;

/**
 * Interface used by all schemas
 */
interface SchemaInterface
{
    /**
     * Search and returns the schemas found
     * 
     * @param \DOMDocument $html
     * 
     * @return array
     */
    public static function getData(\DOMDocument $html);
}
