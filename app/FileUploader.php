<?php

interface FileUploader
{
    function __construct($client = null, $config = []);
    function store($file, $filename);
}