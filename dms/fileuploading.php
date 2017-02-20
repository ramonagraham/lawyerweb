<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<a href="filesearching.php">Search For Files</a>
<br/>
<br/>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <br/>
    <br/>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br/>
    <br/>
    <input type="submit" value="Upload File" name="submit">
</form>
<br/>
<br/>
<?php echo $_SESSION['uploaded']; ?>
</body>
</html>