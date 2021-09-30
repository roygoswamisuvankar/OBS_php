/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   $(".wallet").hide();
   $(".cards").hide();
   $(".makepay").hide();
   $(".transaction").hide();
   $(".loginhistory").hide();
   
   $("#my_details").click(function(){
       $(".mydetails").show();
       $(".wallet").hide();
       $(".cards").hide();
       $(".makepay").hide();
       $(".transaction").hide();
       $(".loginhistory").hide();
   });
   
   $("#wallet").click(function(){
        $(".mydetails").hide();
        $(".wallet").show();
        $(".cards").hide();
        $(".makepay").hide();
        $(".transaction").hide();
        $(".loginhistory").hide();
   });
   
   $("#cards").click(function(){
       $(".mydetails").hide();
       $(".wallet").hide();
       $(".cards").show();
       $(".makepay").hide();
       $(".transaction").hide();
       $(".loginhistory").hide();
   });
   
   $("#makepay").click(function(){
       $(".mydetails").hide()
       $(".wallet").hide();
       $(".cards").hide();
       $(".makepay").show();
       $(".transaction").hide();
       $(".loginhistory").hide();
   });
   
   $("#transaction").click(function(){
       $(".mydetails").hide()
       $(".wallet").hide();
       $(".cards").hide();
       $(".makepay").hide();
       $(".transaction").show();
       $(".loginhistory").hide();
   });
   
   $("#history").click(function(){
       $(".mydetails").hide()
       $(".wallet").hide();
       $(".cards").hide();
       $(".makepay").hide();
       $(".transaction").hide();
       $(".loginhistory").show();
   });
   
   $(".sidenav").on('click', 'a', function () {
        $(".sidenav a.active").removeClass("active");
        // adding classname 'active' to current click li 
        $(this).addClass("active");
    });
});


