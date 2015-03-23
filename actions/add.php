<?php
require_once('../includes/function.php');
$post_error = [];
$output = [];

print_r($_POST);

if(isset($_POST))
{
    if($_POST['title'] == '')
    {
        $post_error['title'] = 'Title is empty!';
    }
    if($_POST['date'] == '')
    {
        $post_error['date'] = 'Set the date!';
    } 
    if($_POST['textarea'] == '')
    {
        $post_error['textarea'] = 'Please write something on your blog';
    }
    
    if(count($post_error) == 0) 
    {
        $CONN = mysqli_connect('localhost', 'root', '', 'ana_blog');
        $title = $_POST['title'];
        $date = $_POST['date'];
        $textarea = $_POST['textarea'];
        $mysql_errors = [];
        
        $sql = "INSERT INTO blog_post ('title', 'date', 'textarea') VALUES ('$title', '$date', '$textarea')";
        $result = mysqli_query($CONN, $sql);
        
        if(!$result) {
            $mysqli_errors[] = mysqli_error($CONN);
        }
        if(count($mysql_errors) == 0)
           {
            $output['success'] = true;
            header('Location: ../includes/index.php?page=blog');
            
            $output['message'] = 'Data Saved';
           }
            else 
           {
            $output['success'] = false;
            $output['message'] = $mysql_errors;
           }
    }
           else
           {
            $output['success'] = false;
            $output['message'] = 'No data available';
           }
echo json_encode($output);
}
?>