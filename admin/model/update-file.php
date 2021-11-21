<?php

namespace SmartWeb\File;

use Exception;

class Upload
{
    //new name when file name duplicated
    protected $newName;
    //Path to the upload folder.
    protected $destination;
    //Maximum file size
    protected $max = 51200;
    //messages to report the status of uploads
    protected $messages = [];
    //permitted MINE types
    protected $permitted = [
        'image/gif',
        'image/jpeg',
        'image/pjeg',
        'image/png',
        'image/webp'
    ];

    //contructor
    public function __construct($path)
    {
        //is_dir() check valid directory
        //is_writable check filename is writable.
        if (is_dir($path) && is_writable($path)) {
            //rtrim() delete the ends with a slash
            $this->destination = rtrim($path, '/\\') . DIRECTORY_SEPARATOR;
        } else {
            throw new \Exception("$path must be a valid, writable diretory");
        }
    }

    /**
     * update file 
     * 
     * PHP version 7
     * @param fieldname (required) is the name of the file input field in the upload form.
     * @param size (option) is an integer to change the default maximum file size in bytes.
     * @param permitted (option) is an array of MINE types to allow files other than images to be upload.
     * @param remaneDuplicates (option) Setting this to false overwrites files with the same name in the upload folder.
     *
     */
    public function upload($fieldname, $size = null, array $mine = null, $remaneDuplicates = true)
    {
        $uploaded = $_FILES[$fieldname];

        if (!is_null($size) && $size > 0) {
            $this->max = (int)$size;
        }
        if (!is_null($mine)) {
            $this->permitted = array_merge($this->permitted, $mine);
        }
        //print_r($uploaded['name']);die();
        if (is_array($uploaded['name'])) {
            //deal with multiple uploads.
            $numFiles = count($uploaded['name']);
            $keys = array_keys($uploaded); // get keys.
            for ($i = 0; $i < $numFiles; $i++) {
                $values = array_column($uploaded, $i); //get column
                $currentfile = array_combine($keys, $values); //combine keys and  column.
                $this->processUpload($currentfile, $remaneDuplicates);
                //var_dump($currentfile);
            }
        } else {
            //
            $this->processUpload($uploaded, $remaneDuplicates);
        }
    }

    protected function processUpload($uploaded, $remaneDuplicates)
    {
        if ($this->checkFile($uploaded)) {
            $this->checkName($uploaded, $remaneDuplicates);
            $this->moveFile($uploaded);
        }
    }

    /**
     * Check file name 
     * 
     * @param file is file that need check.
     * @param remaneDulicates allow dulicates file.
     */
    protected function checkName($file, $remaneDulicates)
    {
        $this->newName = null;
        $nospace = str_replace('', '_', $file['name']);
        if ($nospace != $file['name']) {
            $this->newName = $nospace;
        }
        if ($remaneDulicates) {
            $name = $this->newName ?? $file['name'];
            if (file_exists($this->destination . $name)) {
                //rename file
                $basename = pathinfo($name, PATHINFO_FILENAME); //split file name.  
                $extension = pathinfo($name, PATHINFO_EXTENSION); //split file extension.
                $this->newName = $basename . '_' . time() . ".$extension";
            }
        }
    }

    /**
     * check file
     * @return bool
     */
    protected function checkFile($file)
    {
        $accept = $this->getErrorLevel($file);
        if (!empty($file['type'])) {
            $accept = $this->checkType($file);
        }
        $accept = $this->checkSize($file);
        return $accept;
    }

    /** 
     * move file to destination 
     * @param $file is moved to the destination. 
     */
    protected function moveFile($file)
    {
        $filename = $this->newName ?? $file['name'];

        $success = move_uploaded_file($file['tmp_name'], $this->destination . $filename);
        if ($success) {
            $result = $file['name'] . ' was uploaded sucessfully';
            if (!is_null($this->newName)) {
                $result .= ' , and was renamed ' . $this->newName;
            }
            $this->messages[] = $result;
        } else {
            $this->messages[] = 'Could not upload ' . $file['name'];
        }
    }
    /**
     * Returns an array of messages reporting the status of uploads.
     * 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    protected function getErrorLevel($file)
    {
        switch ($file['error']) {
            case 0:
                return true;
                break;
            case 1:
            case 2:
                $this->messages[] = $file['name'] . 'is too big: (max: ' . $this->getMaxSize() . ').';
                break;
            case 3:
                $this->messages[] = $file['name'] . ' was only partically uploaded.';
                break;
            case 4:
                $this->messages[] = 'No file submitted.';
                break;
            default:
                $this->messages[]  = 'Sorry, there was a problem uploading  ' . $file['name'];
                break;
        }
        return false;
    }
    protected function  checkSize($file)
    {
        if ($file['error'] == 1 || $file['error'] == 2) {
            return false;
        } elseif ($file['size'] == 0) {
            $this->messages[] = $file['name'] . ' is an empty file.';
            return false;
        } elseif ($file['size'] > $this->max) {
            $this->messages[] = $file['name'] . ' exceeds the maximum size for a file (' . $this->getMaxSize() . ')';
            return false;
        }
        return true;
    }
    protected function checkType($file)
    {
        if (!in_array($file['type'], $this->permitted)) {
            $this->messages[] = $file['name'] . ' is not permitted type of file.';
            return false;
        }
        return true;
    }
    public function getMaxSize()
    {
        return number_format($this->max / 1024, 1) . 'KB';
    }

    public function getNewName()
    {
        return $this->newName;
    }
}
