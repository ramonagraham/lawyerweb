<?php

class FileProcessing
{
    private $conn;
    private $wordsToFind = array();
    private $fileName;

    function __construct($conn,$fileName)
    {
        $this->conn = $conn;
        $this->fileName = $fileName;
    }

    function parseFile ()
    {
        $txt_file = file_get_contents('uploads/' . $this->fileName);
        $foundText = preg_split('/\s+/', $txt_file);

        print_r($foundText);

        foreach ($foundText as $word) {
            $word = trim($word);
            $word = strtolower($word);
            if (array_key_exists($word, $this->wordsToFind)) {
                $value = $this->wordsToFind[$word];
                $value++;
                $this->wordsToFind[$word] = $value;
            } else {
                $this->wordsToFind[$word] = 1;
            }
        }
        echo "<br/><br/><br/>";
        print_r($this->wordsToFind);

        foreach ($this->wordsToFind as $key => $value) {
            $word = trim($key);
            $word = strtolower($word);
            $this->insertIntoDatabase($word, $value);
        }
    }

    private function insertIntoDatabase ($keyword,$count) {
        $sql = "INSERT INTO keyword_tags(file_name, keyword, count)
                        VALUES(:fileName,:keyword,:count)";
        $statement = $this->conn->prepare($sql);

        $statement->bindValue(':fileName',$this->fileName, PDO::PARAM_STR);
        $statement->bindValue(':keyword',$keyword, PDO::PARAM_STR);
        $statement->bindValue(':count',$count, PDO::PARAM_INT);

        $statement->execute();
    }

    private function updateDatabase ($keyword,$count) {
        $sql = "UPDATE `keyword_tags` SET count=:count WHERE file_name=:fileName AND keyword=:keyword";
        $statement = $this->conn->prepare($sql);
        $statement->bindValue(':count',$count, PDO::PARAM_INT);
        $statement->bindValue(':fileName',$this->fileName, PDO::PARAM_STR);
        $statement->bindValue(':keyword',$keyword, PDO::PARAM_STR);

        $statement->execute();
    }

    function getSearchResults ($keyword) {
        $sql = "SELECT file_name FROM `keyword_tags` WHERE keyword=:keyword AND count!=0 ORDER BY count DESC";
        $statement = $this->conn->prepare($sql);
        $statement->bindValue(':keyword',$keyword, PDO::PARAM_STR);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}

?>