var Gritter = function () {

    $('#aktivasi-artikel').click(function(){

        $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'This is a notice without an image!',
            // (string | mandatory) the text inside the notification
            text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.'
        });

        return false;
    });

}();

function pesanNotif(title,text)
{
    var Gritter = function ()
    {
        $('#aktivasi-user').click(function(){

            $.gritter.add({

                title : 'Are you Sure ?',
                text  : 'this message'
            });
            return false;
        });
    }();
}