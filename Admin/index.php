<?php
include '../PhpConsole/__autoload.php';
PhpConsole\Helper::register(); // it will register global PC class
include '../settings.php';
include 'projectSettings.php';
include 'header.php';
?>
<p id="currentPage">Current page is: <?= $_SESSION['antraste'] ?></p>
<form id="page-form" action="" method="POST" enctype="multipart/form-data">
<div id="editor">
<input type="text" name="heading" id="heading" value="<?php echo $_SESSION['antraste'] ?>">
<textarea name="content" id="content" cols="100" rows="23"><?php echo $_SESSION['turinys'] ?></textarea>
</div>
<div id="side">
<div>
<div>
<input type="file" name="imageUpload" value="Add image" id="file" onChange="makeFileList();"/>
<div id="imagePreview"></div>
</div>
<input type="submit" name="upload-page" value="Upload" id="upload">
<input type="submit" name="update-page" value="Update" id="update">
<input type="submit" name="DeletePage" value="Delete Current Page" id="DeletePage">
</div>
<div>
<p id="imageAdd">Current page photo:</p>
<img src="<?= $_SESSION['nuoroda'] ?>" onerror="this.src='<?php echo $projectSettings['defaultImg']?>'" width="300px" height="200px" class="pagePhoto" alt="">
</div>
</div>

</form>
<div class="whitespace2"></div>

<?php
include 'footer.php';
PC::debug($userID, 'userID');
PC::debug($_SESSION['pageID'], 'pageID');
PC::debug($Settings, 'settings');
PC::debug($_SESSION['nuoroda'], 'image path');
