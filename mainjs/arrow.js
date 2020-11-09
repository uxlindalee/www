// JavaScript Document

   $(document).ready(function () {

	     $('.right').click(function () {
         $('.shortcut ul li:first').appendTo('.shortcut ul'); 
         });
       
		 $('.left').click(function () {
         $('.shortcut ul li:last').prependTo('.shortcut ul');
         });
   });