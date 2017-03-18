$(function() {

    $("a.delete-message").on("click", function(e) {
        var $link = $(this);
        var $message = $link.parents(".message");

        e.preventDefault();

        if(confirm("Are you sure you want to delete this message? This action cannot be undone!")) {
            
            // window.location = link.href;
            $.ajax({
                type: "POST",
                url: this.href,
                data: {},
                success: function(data, textStatus, jqXHR) {
                    if(jqXHR.status == 200)
                    {
                        $message.fadeOut(300);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        }
    });

});