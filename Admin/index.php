<?php
include '../PhpConsole/__autoload.php';
PhpConsole\Helper::register(); // it will register global PC class
include 'header.php';
?>
<div id="whitespace"></div>
<form id="page-form" action="" method="POST">
<div id="editor">
<input type="text" name="heading" id="heading">
<textarea name="content" id="content" cols="100" rows="23"></textarea>
</div>
<div>
<input type="submit" name="upload-page" value="Upload" id="upload">
</div>
</form>



<?php
include 'footer.php';
PC::debug($userID, 'tag');
// PC::tag($var);


