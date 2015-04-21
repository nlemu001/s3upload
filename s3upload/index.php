<?php
    include('image_check.php');
    $msg='';
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $tmp = $_FILES['file']['tmp_name'];
        $ext = getExtension($name);

        if(strlen($name) > 0)
        {
            if(in_array($ext,$valid_formats))
            {
                if($size<(1024*1024))
                {
                    include('s3_config.php');
                    //Rename image name. 
                    $actual_image_name = $name;
                    if($s3->putObject(array(
                        'ACL'                =>      'public-read',
                        'Bucket'            =>      $bucket,
                        'Key'                 =>      $actual_image_name,
                        'SourceFile'     =>      $tmp
                        ) ))
                    {
                        $msg = "S3 Upload Successful.";	
                    }
                    else
                        $msg = "S3 Upload Fail.";
                }
                else
                    $msg = "Image size Max 1 MB";
            }
            else
                $msg = "Invalid file, please upload image file.";
        }
        else
            $msg = "Please select image file.";

    }

?>
    <!DOCTYPE html PUBLIC>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Upload doc button</title>
    </head>

    <body>
    <form action="" method='post' enctype="multipart/form-data">
    <h3>Upload image file here</h3><br/>
    <div style='margin:10px'><input type='file' name='file'/> <input type='submit' value='Upload Image'/></div>
    </form>

<?php 
echo $msg.'<br/>'; 
?>
		

</body>
</html>
