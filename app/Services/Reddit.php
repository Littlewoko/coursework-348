<?php

nameSpace App\Services;

class Reddit
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function comment($text)
    {
        dd($text);
    }
}
