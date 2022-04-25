<?php

class S3FileUploader implements FileUploader
{
    private $s3client;

    function __construct($client = null, $config = [])
    {
        $this->s3client = $client;
    }

    function store($file, $filename)
    {
        return $this->s3client->putobject([
            'Bucket' => $_ENV['S3_BUCKET'],
            'Key' => $_ENV['S3_KEY'] . '/' . $filename,
            'Body' => $file]);
    }
}