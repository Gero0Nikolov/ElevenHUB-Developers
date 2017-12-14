jQuery( document ).ready( function(){
	if ( jQuery( "body" ).hasClass( "page-template-leave-message" ) ) {
		jQuery( "#submit-message" ).on( "click", function(){
			first_name = jQuery( "#first-name" ).val().trim();
			last_name = jQuery( "#last-name" ).val().trim();
			email = jQuery( "#email" ).val().trim();
			textarea = jQuery( "#message-content" ).val().trim();

			flag = false;

			if ( first_name == "" || first_name == null ) {
				flag = true;
				alert( "Enter your first name!" );
			}

			if ( last_name == "" || last_name == null ) {
				flag = true;
				alert( "Enter your last name!" );
			}

			if ( email == "" || email == null ) {
				flag = true;
				alert( "Enter your email!" );
			}

			if ( textarea == "" || textarea == null ) {
				flag = true;
				alert( "What is your note?" );
			}

			if ( flag == false ) {
				jQuery.ajax( {
					url : ajax_url,
					type : "POST",
					data : {
						action : "leave_note",
						first_name : first_name,
						last_name : last_name,
						email : email,
						textarea : textarea
					},
					success : function( response ){
						if ( response !== undefined && response != ""  && response != null ) {
							result = JSON.parse( response );
							if ( result != true ) { alert( result ); }
							else { window.location.reload( true ); }
						}
					},
					error : function( response ){ console.log( response ); }
				} );
			}
		} );
	}

	// Documentation search
	jQuery( "#search-box" ).on( "focus", function(){
		if ( jQuery( "body" ).hasClass( "mobile" ) ) {
			jQuery( "#default-list" ).show();
		}
	} );

	jQuery( "#method-description" ).on( "click", function( e ){
		if ( jQuery( "body" ).hasClass( "mobile" ) ) {
			jQuery( "#default-list" ).hide();
		}
	} );

	jQuery( "#search-box" ).on( "keyup", function( e ){
		query_ = jQuery( this ).val().trim().toLowerCase();
			if ( query_ != "" ) {
			jQuery( "#default-list .list-item" ).each( function(){
				if ( jQuery( this ).html().toLowerCase().indexOf( query_ ) == -1 ) { jQuery( this ).addClass( "hidden" ); }
				else { jQuery( this ).removeClass( "hidden" ); }
			} );
		} else {
			jQuery( "#default-list .list-item" ).each( function(){
				jQuery( this ).removeClass( "hidden" );
			} );
		}
	} );
} );
