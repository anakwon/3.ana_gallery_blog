<html>
<body>
    <div id="add_post">
    <form action="../actions/add.php" method="post">
        Date (month and year):
        <input type="month" name="date">
        <!--<input type="submit">-->
    <input type="text" name="title" placeholder="TITLE"></input>
    <textarea class="text_post" rows="3" name="textarea" placeholder="TEXTAREA"></textarea>
    <button type="submit" id="post_btn" value="submit">Post</button> 
    </form>
    </div>
</body>
</html>