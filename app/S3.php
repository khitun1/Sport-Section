<?php

use Aws\S3\S3Client;

class S3
{
    private $s3client;

    public function __construct(){
        $this->s3client = new S3Client([
            'version' => $_ENV['S3_VERSION'],
            'region' => $_ENV['S3_REGION'],
            'endpoint' => $_ENV['S3_ENDPOINT'],
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key' => $_ENV['S3_KEY'],
                'secret' => $_ENV['S3_SECRET'],
            ],
        ]);
    }

    public function getS3Client(){
        return $this->s3client;
    }
}