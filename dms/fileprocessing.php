<?php

class FileProcessing
{
    private $conn;
    private $wordsToFind = array("supreme" => 0, "constitution" => 0, "appeals" => 0, "immigration" => 0, "lur" => 0,
                                    "mls" => 0, "ema" => 0, "parcel" => 0);
    private $fileName;

    function __construct($conn,$fileName)
    {
        $this->conn = $conn;
        $this->fileName = $fileName;
    }

    function parseFile ()
    {
        $txt_file = file_get_contents('uploads/' . $this->fileName);
        $foundWords = preg_split('/\s+/', $txt_file);

        foreach ($foundWords as $word) {
            $word = trim($word);
            $word = strtolower($word);
            if (array_key_exists($word, $this->wordsToFind)) {
                $value = $this->wordsToFind[$word];
                $value++;
                $this->wordsToFind[$word] = $value;
            }
        }

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