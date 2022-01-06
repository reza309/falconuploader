<?php require_once("classes/Upload.php")?>
<?php
    // configer file type
    $file_type = ["jpg","png","jpeg","gif"];
    $config_data = [
        "file_name"             => null, //you may set a file name
        "name_attribute"        => "image", //value of input field name attribute
        "target_dir"            => "images/",
        // "file_type"             => $file_type, //file type should be any valid file type, default "jpg","png","jpeg","gif"
        // "max_size"              => 4000,    //size may "KB", default size "50KB"
        
        // "upload_option"         => "multiple", //upload option may be "multiple" or "single"
        // "have_marching"         => true ,// if it true, permit to store partial data othrwise not permit to store
        // "watermark"             => true, //to create watermark set "true", default "false"
        //"watermark_type"      => "text", //Set watermark type "text" or "image"
        // "watermark_text"     => "IT CORNER", // if watermark text not set it will show default text
        // "watermark_position"  =>"bottom-right", //water mark position should be "center", "center-top","center-bottom"
                                            //"top-left","top-right". "bottom-right","bottom-left"
        // "watermark_style"     =>"vartical", //water mark style should be "angle", "vartical","horizontal"
        // "watermark_opacity"     => 7, //watermark opacity should "0 to 100" default opacity
        // "watermark_font_size"   => 50  // set watermark text font size, default size 50 

    ]
?>
<?php $upload = new Upload($config_data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="tools/bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">

        <div class="container">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link 3</a>
                </li>
            </ul>
        </div>

    </nav>
    <div class="rec">
        <div class="inner-rec"></div>
    </div>
    <main class="container">
        <div class="bg-light pt-3">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <!-- server script using php -->
                    <?php 
                        if($_SERVER['REQUEST_METHOD']=='POST')
                        {
                            $upload_status = $upload->store();
                            echo("<pre>");
                            print_r($upload_status);
                            echo("</pre>");
                            print_r ($upload->get_target_file());
                        }
                    ?>
                    
                    <!-- upload form -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">User Cover</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple name="image">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">User Avater</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple name="image[]">
                        </div> -->
                       
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="submit" value="Save File" class="btn btn-primary w-100">   
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </main>
</body>
</html>