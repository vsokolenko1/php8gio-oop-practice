<h2><?=$formName?></h2>
<form action="/transactions/multiupload" method ="post" enctype="multipart/form-data">
    <input type="file" multiple name="files[]" />
    <input type="submit" value="Upload" />
</form>
