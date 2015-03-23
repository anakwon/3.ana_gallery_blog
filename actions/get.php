<?php
    $CONN = mysqli_connect('localhost', 'root', '', 'ana_blog');
    $sql = 'SELECT * FROM ana_blog ORDER BY date';
    $results = mysqli_query($CONN, $sql);
    $output = [];

    $blog_html='<div class="row row-header">
            <div class="col-md-3">Title</div>
            <div class="col-md-3">Date</div>
            <div class="col-md-3">Details</div>
            <div class="col-md-3">Remove</div>
        </div>';
    while($post_row = mysqli_fetch_assoc($results)){
        
        $id = $post_row['id'];
        $title = $post_row['title'];
        $date = $post_row['date'];
        $textarea = $post_row['textarea'];
        
         $blog_post_html = 
                "<div class='row todo-record' data-id='$id'>
                    <div class='col-md-3 todo-title'>$title</div>
                    <div class='col-md-3 todo-date'>".date('Y-m-d H:i:s',$date)."</div>
                    <div class='col-md-3 todo-details'>".nl2br($textarea)."</div>
                    <div class='col-md-3'><button type='button' class='delete_btn'>Delete</button></div>
                </div>\n";
        $blog_html.=$blog_post_html;
    }
    if(mysqli_num_rows($results) > 0 {
        $output=['success'=>true, 'html'=>$blog_html];
    }
    else{
        $output=['success'=>false, 'message'=>'No blogs avaliable'];
    }
       echo json_encode($output);
?>