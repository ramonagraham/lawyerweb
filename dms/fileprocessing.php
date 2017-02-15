<?php

class FileProcessing
{
    private $wordsToFind = array("hi" => 0, "the" => 0);
    private $fileName;

    function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    function parseFile ()
    {
        $txt_file = file_get_contents($this->fileName);
        $foundWords = preg_split('/\s+/', $txt_file);

        foreach ($foundWords as $word) {
            $word = trim($word);
            if (array_key_exists($word, $this->wordsToFind)) {
                $value = $this->wordsToFind[$word];
                $value++;
                $wordsToFind[$word] = $value;
            }
        }

        print_r($this->wordsToFind);
    }
}

?>