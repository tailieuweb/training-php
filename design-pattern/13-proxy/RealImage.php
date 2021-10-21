<?php
class RealImage implements Image
{
    private $fileName;

    public function __construct($fileNameIn)
    {
        $this->fileName = $fileNameIn;
        $this->loadFromDisk($fileNameIn);
    }

    function display()
    {
        // TODO: Implement display() method.
        echo "Displaying " . $this->fileName . "<br>";
    }

    private function loadFromDisk($fileNameIn)
    {
        echo "Loading ".$fileNameIn . "<br>";
    }
}