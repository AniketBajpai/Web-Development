<html>
<head>
<title>Upload Form</title>
</head>

<body>

<?php echo $error;?>

<?php echo form_open_multipart('index.php/upload/do_upload');?>

<input type="file" name="userfile" />

<div id="upload">
  <form action="/upload" class="dropzone" id="demo-upload">

  <div class="dz-message">
    Drop files here or click to upload.<br />    
  </div>

  </form>
</div>

<br /><br />

<input type="submit" value="upload" />

</form>

</body>

<script src="/codeigniter/assets/dropzone.js"></script>

</html>