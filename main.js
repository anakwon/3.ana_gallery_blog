var pages = {
    About: {pageUrl: "index.php?page=about.php"},
    Blog: {pageUrl: "index.php?page=blog.php"},
    Gallery: {pageUrl: "index.php?page=gallery.php"},
    Contact: {pageUrl: "index.php?page=contact.php"}
};

$('document').ready(function () {

            var getNewData = function () {
                $.ajax({
                    url: 'actions/get.php',
                    dataType: 'json',
                    cache: false,
                    method: 'POST',
                    success: function (data) {
                        if (data.success) {
                            $("#blog_content > #main_content").html(data.html);
                        }
                    }
                });
            };

            $("#post_btn").click(function () {

                var addblog = $("#add_post");
                var form_data = {
                    title: addblog.find("input[name=title]").val(),
                    date: addblog.find("input[name=date]").val(),
                    details: addblog.find("textarea[name=textarea]").val(),
                }
                $.ajax({
                    url: 'actions/add.php',
                    data: form_data,
                    dataType: 'json',
                    cache: false,
                    method: 'POST',
                    success: function (response) {
                        //success is achieved!
                        console.log(response);
                        console.log(response['success']);
                        if (response['success']) {
                            getNewData();
                        }
                    }
                });

            });


            $("#display_refresh").click(function () {
                getNewData();
            });

            $("#main-content").on('click', '.delete_btn', function () {
                //on:signs the event [in the main-content, when something is clicked it will get deleted.]
                //. object ['id'] = object.id
                
                
                //THIS is referring to the delete button that was clicked.
                var clicked_row = $(this);
                //creating variable for whatever is clicked
                var list_id = clicked_row.parent().attr('data-id'); 
                //getting the id of the row that is clicked
                
                var delete_id = { //this is an object
                    id: list_id
                };
                $.ajax({ 
                    url: 'actions/remove.php',
                    data: delete_id,
                    dataType: 'json',
                    cache: false,
                    method: 'POST',
                    success: function (response) {
            
                    clicked_row.parent().remove();

                    }
                });
                
            });
});