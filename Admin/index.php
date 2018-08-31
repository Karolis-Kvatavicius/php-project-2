<?php
include '../PhpConsole/__autoload.php';
PhpConsole\Helper::register(); // it will register global PC class
include 'header.php';
?>
<div id="whitespace"></div>
<form id="page-form" action="" method="POST" enctype="multipart/form-data">
<div id="editor">
<input type="text" name="heading" id="heading" value="<?php echo $_SESSION['antraste'] ?>">
<textarea name="content" id="content" cols="100" rows="23"><?php echo $_SESSION['turinys'] ?></textarea>
</div>
<div>
<input type="submit" name="upload-page" value="Upload" id="upload">
<input type="submit" name="update-page" value="Update" id="update">
<input type="file" name="imageUpload" value="Add image" id="file">
<img onerror="this.src='images/netrinti/Default.png'" width="150px" height="100px" class="pagePhoto" src="<?php echo $_SESSION['imgPath'];?>" alt="">
<div id="imagePreview"></div>
</div>
</form>



<?php
include 'footer.php';
PC::debug($userID, 'userID');
PC::debug($_SESSION['pageID'], 'pageID');
// PC::debug($pageID, 'On Page creation');

