/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function ( $ ) {

	function getContrastYIQ( hexcolor ) {
		if ( hexcolor.length < 6 ) return '#000000';

		var r = parseInt( hexcolor.substr( 1, 2 ), 16 );
		var g = parseInt( hexcolor.substr( 3, 2 ), 16 );
		var b = parseInt( hexcolor.substr( 5, 2 ), 16 );
		var yiq = ( ( r * 299 ) + ( g * 587 ) + ( b * 114 ) ) / 1000;
		return ( yiq >= 128 ) ? '#000000' : '#ffffff';
	}

	function shiftSL( color, original ) {
		var c = tinycolor( color ).toHsl();
		var o = tinycolor( original ).toHsl();
		return tinycolor( {
			h: c.h,
			s: o.s,
			l: o.l
		} ).toHexString();
	}

	function shadeColor( col, amt ) {
		var usePound = false;
		if ( col[ 0 ] == "#" ) {
			col = col.slice( 1 );
			usePound = true;
		}
		var num = parseInt( col, 16 );
		var r = ( num >> 16 ) + amt;
		if ( r > 255 ) r = 255;
		else if ( r < 0 ) r = 0;
		var b = ( ( num >> 8 ) & 0x00FF ) + amt;
		if ( b > 255 ) b = 255;
		else if ( b < 0 ) b = 0;
		var g = ( num & 0x0000FF ) + amt;
		if ( g > 255 ) g = 255;
		else if ( g < 0 ) g = 0;

		return ( usePound ? "#" : "" ) + String( "000000" + ( g | ( b << 8 ) | ( r << 16 ) ).toString( 16 ) ).slice( -6 );
	}

	function hexToRgbA( hex, alpha ) {
		var c;
		if ( /^#([A-Fa-f0-9]{3}){1,2}$/.test( hex ) ) {
			c = hex.substring( 1 ).split( '' );
			if ( c.length == 3 ) {
				c = [ c[ 0 ], c[ 0 ], c[ 1 ], c[ 1 ], c[ 2 ], c[ 2 ] ];
			}
			c = '0x' + c.join( '' );
			return 'rgba(' + [ ( c >> 16 ) & 255, ( c >> 8 ) & 255, c & 255 ].join( ',' ) + ',' + ( alpha || 1 ) + ')';
		}
		throw new Error( 'Bad Hex' );
	}

	var hover_amount = 15;
	// Site title and description.
	wp.customize( 'blogname', function ( value ) {
		value.bind( function ( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function ( value ) {
		value.bind( function ( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	// Header text color.
	/*
	wp.customize( 'header_textcolor', function ( value ) {
		value.bind( function ( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	
	wp.customize( 'idaho_color_primary', function ( value ) {
		value.bind( function ( to ) {
			jss.set( '.dropdown-menu li a:hover', {
				'background': to,
				'color': getContrastYIQ( to )
			} );

			jss.set( '.btn.btn-primary', {
				'background': to,
				'border-color': to,
				'color': getContrastYIQ( to )
			} );

			jss.set( '.btn.btn-primary:hover', {
				'background': tinycolor( to ).darken( hover_amount ).toString(),
				'border-color': tinycolor( to ).darken( hover_amount ).toString(),
				'color': getContrastYIQ( shadeColor( to, hover_amount ) )
			} );

			jss.set( '.btn.btn-secondary', {
				'border-color': tinycolor( to ).darken( 50 ).toString(),
			} );

			jss.set( '.btn.btn-secondary:hover', {
				'background': to,
				'border-color': to,
				'color': getContrastYIQ( to )
			} );

		} );
	} );
	
	wp.customize( 'idaho_color_data_table', function ( value ) {
		value.bind( function ( to ) {

			jss.set( 'table.dataTable thead td', {
				'background': shiftSL( to, '#eef7fb' ),
				'border-color': shiftSL( to, "#d9edf7" )
			} );

			jss.set( '.table-striped > thead > tr, table.dataTable tbody tr:first-child td', {
				'border-color': shiftSL( to, "#d9edf7" ),
			} );

			jss.set( '.table-hover > tbody > tr:hover', {
				'background': shiftSL( to, "#d9edf7" ),
			} );

		} );
	} );

	wp.customize( 'idaho_color_header_bg', function ( value ) {
		value.bind( function ( to ) {

			jss.set( '#masthead .site-branding', {
				'background': to
			} );

		} );
	} );
	*/

	wp.customize( 'idaho_color_link', function ( value ) {
		value.bind( function ( to ) {
			jss.set( 'a, .navbar-default .navbar-nav>li>a, .pagination>li>a', {
				'color': to
			} );
			jss.set( 'a:hover, .pagination>li>a:hover', {
				'color': to
			} );
		} );
	} );

	/*
	wp.customize( 'idaho_color_nav_hover', function ( value ) {
		value.bind( function ( to ) {
			jss.set( '.navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a:focus, .sidebar-menu>ul>li>a:hover, .pagination>.active>a, .pagination>.active>a:hover', {
				'background': to,
				'border-color': to,
				'color': ( '#879967' !== to ) ? getContrastYIQ( to ) : '#fff'
			} );

		} );
	} );

	wp.customize( 'background_color', function ( value ) {
		value.bind( function ( to ) {

			jss.set( '.gradient-background-cutoff', {
				'background-image': 'linear-gradient(' + tinycolor( to ).setAlpha( .1 ).toString() + ' 0%, ' + to + ' 100%)',
			} );

		} );
	} );

	wp.customize( 'idaho_gradient_top', function ( value ) {
		value.bind( function ( to ) {

			jss.set( '.gradient-background-cutoff', {
				'top': to + 'px',
			} );

		} );
	} );
	*/

	wp.customize( 'idaho_color_home_panel', function ( value ) {
		value.bind( function ( to ) {
			jss.set( '.card.card-default.alt .card-heading', {
				'background': to,
				'border-color': to,
				'color': getContrastYIQ( to )
			} );
			jss.set( '.card.card-default.alt', {
				'border-color': to,
			} );
		} );
	} );

	wp.customize( 'idaho_color_secondary', function ( value ) {
		value.bind( function ( to ) {
			jss.set( 'h2, h1.entry-title', {
				'color': to
			} );
		} );
	} );

	var timeout = false;

	wp.customize( 'idaho_color_ui_blue', function ( value ) {
		value.bind( function ( to ) {
			jss.set( '.site-footer', {
				'background': to
			} );

			jss.set( '.navbar-default', {
				'border-color': to
			} );

			jss.set( '#masthead .site-branding', {
				'border-color': to
			} );

			var footer_links = "#ffffff";
			if ( getContrastYIQ( to ) === '#000000' ) {
				footer_links = tinycolor( getContrastYIQ( to ) ).darken( hover_amount ).toString();
			} else {
				footer_links = tinycolor( getContrastYIQ( to ) ).lighten( hover_amount ).toString();
			}

			jss.set( '.site-footer h3', {
				'border-bottom': '1px solid ' + getContrastYIQ( to ),
				'box-shadow': '0 1px 0 ' + tinycolor( to ).lighten( 30 ).toString(),
				'color': getContrastYIQ( to )
			} );

			jss.set( '.site-footer a', {
				'color': footer_links
			} );

			jss.set( '.site-footer a:hover', {
				'color': getContrastYIQ( to )
			} );

			if ( timeout ) clearTimeout( timeout );
			timeout = setTimeout( function () {
				$( '#usa-map img' ).attr( 'src', $( '#usa-map img' ).attr( 'src' ).replace( /(primary=)[^\&]+/, '$1' + to.replace( '#', '' ) ) );
			}, 250 );
		} );
	} );

	var timeout2 = false;

	wp.customize( 'idaho_color_light_blue', function ( value ) {
		value.bind( function ( to ) {
			jss.set( '.search-form .input-group', {
				'border-color': to,
				'background': to
			} );

			jss.set( '.search-form .btn', {
				'background': to,
				'border-color': to,
				'color': ( '#7696c9' !== to ) ? getContrastYIQ( to ) : '#fff'
			} );

			jss.set( '.search-form .btn:focus', {
				'background': tinycolor( to ).darken( hover_amount ).toString(),
				'border-color': tinycolor( to ).darken( hover_amount ).toString(),
				'color': getContrastYIQ( tinycolor( to ).darken( hover_amount ).toString() )
			} );

			jss.set( '.search-form input.form-control', {
				'border-color': to,
			} );

			if ( timeout2 ) clearTimeout( timeout2 );
			timeout2 = setTimeout( function () {
				$( '#usa-map img' ).attr( 'src', $( '#usa-map img' ).attr( 'src' ).replace( /(secondary=)[^\&]+/, '$1' + to.replace( '#', '' ) ) );
			}, 250 );
		} );
	} );
} )( jQuery );
