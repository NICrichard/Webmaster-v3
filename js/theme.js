jQuery( document ).ready( function ( $ ) {
	var anchor = window.location.hash.replace( "#", "" );

	if ( anchor && anchor !== '' ) {
		$( ".collapse" ).collapse( 'hide' );
		console.log( anchor )
		$( "#" + anchor ).find( '.collapse' ).collapse( 'show' );
	}
} );
