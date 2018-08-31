<?php
include '../PhpConsole/__autoload.php';
PhpConsole\Helper::register(); // it will register global PC class
include 'header.php';
?>
<div id="whitespace"></div>
<form id="page-form" action="" method="POST">
<div id="editor">
<input type="text" name="heading" id="heading" value="<?php echo $_SESSION['antraste'] ?>">
<textarea name="content" id="content" cols="100" rows="23"><?php echo $_SESSION['turinys'] ?></textarea>
</div>
<div>
<input type="submit" name="upload-page" value="Upload" id="upload">
<input type="submit" name="update-page" value="Update" id="update">
<!-- <input id="uploadFile" type="file" name="image" class="img" /> -->
<input type="file" name="attach-file" value="Add image" id="file">
<div id="imagePreview"></div>
</div>
</form>



<?php
include 'footer.php';
PC::debug($userID, 'tag');
// PC::tag($result);


