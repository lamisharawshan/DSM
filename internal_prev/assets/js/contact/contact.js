/**
 * Created with JetBrains PhpStorm.
 * User: iit
 * Date: 10/9/13
 * Time: 6:39 PM
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function () {
    $("#external_contact_form").on('submit', function (e) {

        e.preventDefault();

        //alert("checking 1");

        var name = $("#external_contact_persons_name").val();
        var email = $("#external_contact_persons_email").val();
        var message = $("#external_contact_persons_message").val();
        //alert(email);
        $.ajax
        ({
            url: "contact/set_contacts_info_in_db",
            type: "post",
            data: {'contacts_name': name, 'contacts_email': email, 'contacts_message': message},
            dataType: "json",
            success: function (row) {

                alert("Form input successfully inserted into DB");
            }

        });


    });
});
