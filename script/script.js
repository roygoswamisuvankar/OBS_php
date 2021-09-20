/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(".regis_sec").hide(); //hide registration form
    $(".login").click(function(){   //click on login button show login form
        $(".login_sec").show();
        $(".regis_sec").hide();
    });
    $(".regis").click(function(){   //click on create account button show registration portion
        $(".regis_sec").show();
        $(".login_sec").hide();
    })
});


