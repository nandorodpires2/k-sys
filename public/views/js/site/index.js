/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
       
    $("#search").keyup(function(){
        var value = $(this).val();
        search(value);
    });
    
});

function search(value) {
    $.ajax({
        url: 'search',
        data: {
            value: value
        },
        beforeSend: function (xhr) {
            var html = "<div class='alert alert-info'>Pesquisando...</div>";
            $("#list-keys").html(html);
        },
        success: function (data, textStatus, jqXHR) {
            $("#list-keys").html(data);
        }   
    });
}

