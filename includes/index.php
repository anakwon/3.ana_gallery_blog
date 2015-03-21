<!DOCTYPE HTML>


<html>

<head>
    <meta charset="UTF-8">
    <title>"Ana\'s Blog"</title>

    <link rel="stylesheet" href="../style.css">
    <script type="text/javascript" src="../main.js"></script>
</head>

<body>
    <?php 
        include( 'header.php'); 
        if(isset ($_GET[ 'page']))
            { 
            $path='../navigation/' .$_GET[ 'page']. '.php'; if(file_exists($path))
            { 
                include ($path); 
            }
        } ?>

    <main id="main_content">
        <div class="content_display"></div>
        <section id="blog_content">
            <div class="blog_box">
                this is where the contents of each page comes
                <?php 
                    $pages=[ 
                        'About'=> ['pageUrl'=>'../navigation/about.php', 'default'=>true], 
                        'Blog' => ['pageUrl'=>'blog.php'], 
                        'Image' => ['pageUrl'=>'image.php'], 
                        'Contact' => ['pageUrl'=>'contact.php'], ]; 

                print_r($_GET); 
                if(!isset($_GET['page'])) { 
                    $_GET['page'] = 'about.php'; 
                } 
                
                ?>

            </div>
        </section>

    </main>
    <?php include( 'footer.php'); ?>

</body>

</html>