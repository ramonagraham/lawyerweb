<!DOCTYPE HTML>
<!--
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO
        THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
        CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
        DEALINGS IN THE SOFTWARE.-->
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<a href="fileuploading.php">Upload File</a>
<h4>Keyword: </h4>
    <input type="text" name="keyword" id="keyword">
    <br/>
    <br/>
    <input type="submit" id="search-submit">
<div id="resutls">
    <h4>Results</h4>
</div>
<script>
    $(document).ready(function () {
        $('#search-submit').click(function () {
            $('p').empty();
            var keyword = $('#keyword').val();
            $.ajax({
                url: 'filesearchscript.php',
                data: {keyword: keyword},
                type: 'post',
                success: function (results) {
                    var output = JSON.parse(results);
                    $.each(output, function (key, value) {
                        $('#resutls').append("<p><a href=uploads/" + value['file_name'] + ">" + value['file_name'] + '</a></p>');
                    });
                }
            });
        });
    });
</script>
</body>

