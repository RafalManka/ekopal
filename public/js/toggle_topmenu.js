$(document).ready(function(){	 
		    $("#top-menu").hide();	 
		    $('#top-menu-button').click(function(){

			   console.log( $('.replace').text() );
			   if ($('.replace').text()=='rozwinąć') {
			   	$('.replace').replaceWith( "<span class=\"replace\">zwinąć</span>" );
			   } else if ($('.replace').text()=='zwinąć'){
			   		$('.replace').replaceWith( "<span class=\"replace\">rozwinąć</span>" );
			   };
			  
			   		
				

			    $('#top-menu-button').val().replace(/roz/,"");
			    $("#top-menu").slideToggle();
			    $(".topmenu-arrow").toggleClass("topmenu-arrow-up"); 
			    });	 
		});