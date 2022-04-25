<?php

class UploadService
{
    private $uploader;

    function __construct($fileUploader){
        $this->uploader = $fileUploader;
    }

    public function upload($file, $filename){
        return $this->uploader->store($file,$filename);
    }
}