<?php
/**
 * Date: 19.04.20
 * Time: 19:48
 */

namespace KSS;

class KSSEngine extends BasicEngine
{

    public function __construct($dbHost, $dbPort, $dbName, $dbUser, $dbPassword)
    {
        parent::__construct($dbHost, $dbPort, $dbName, $dbUser, $dbPassword);
    }

    public function getFullTree(): array
    {
        return [];
    }
}