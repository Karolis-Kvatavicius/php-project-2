<?php
include '../PhpConsole/__autoload.php';
PhpConsole\Helper::register(); // it will register global PC class
include '../settings.php';
include 'projectSettings.php';
include '../Mariaus/createSlug.php';
include 'header.php';
?>

<form id="page-form" action="" method="POST" enctype="multipart/form-data">
<div id="main-editor">
<div id="editor">
<input type="text" name="heading" id="heading" value="<?php echo $_SESSION['antraste'] ?>">
<textarea name="content" id="content" cols="100" rows="23"><?php echo $_SESSION['turinys'] ?></textarea>
</div>
<div id="currentPhoto">
<p id="currentPage">Current page is: <?= $_SESSION['antraste'] ?></p>
<p id="imageAdd">Current page photo:</p>
<img src="<?= $_SESSION['nuoroda'] ?>" width="400px" height="220px" class="pagePhoto" alt="No image set or no page is selected.">
<input type="submit" name="upload-page" value="Upload" id="upload">
<input type="submit" name="update-page" value="Update" id="update">
<input type="submit" name="DeletePage" value="Delete Current Page" id="DeletePage">
</div>
</div>
<h2 id="image-upload">Select image to upload: </h2>
<div id="side">
<input type="file" name="imageUpload" value="Add image" id="file"/>
<div id="imagePreview"></div>
</div>
</form>
<div class="whitespace2"></div>

<?php
include 'footer.php';
PC::debug($userID, 'userID');
PC::debug($_SESSION, 'SESSION');
PC::debug($Settings, 'settings');