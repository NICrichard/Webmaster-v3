( function () {
	tinymce.PluginManager.add( 'idaho_mce_shortcode_button', function ( editor, url ) {
		editor.addButton( 'idaho_mce_shortcode_button', {
			text: false,
			icon: 'code',
			type: 'menubutton',
			menu: [ {
				text: 'Layouts',
				menu: [ {
					text: 'Three Columns',
					onclick: function () {
						editor.insertContent( '<div class="row"><div class="col-md-4"><p>Column 1 content goes here.</p></div><div class="col-md-4"><p>Column 2 content goes here.</p></div><div class="col-md-4"><p>Column 3 content goes here.</p></div></div>' );
					}
				}, {
					text: 'Two Columns (6 6)',
					onclick: function () {
						editor.insertContent( '<div class="row"><div class="col-md-6"><p>Column 1 content goes here.</p></div><div class="col-md-6"><p>Column 2 content goes here.</p></div></div>' );
					}
				}, {
					text: 'Two Columns (8 4)',
					onclick: function () {
						editor.insertContent( '<div class="row"><div class="col-md-8"><p>Column 1 content goes here.</p></div><div class="col-md-4"><p>Column 2 content goes here.</p></div></div>' );
					}
				}, {
					text: 'Two Columns (4 8)',
					onclick: function () {
						editor.insertContent( '<div class="row"><div class="col-md-4"><p>Column 1 content goes here.</p></div><div class="col-md-8"><p>Column 2 content goes here.</p></div></div>' );
					}
				} ]
			}, {
				text: 'Accordion',
				menu: [ {
					text: 'Accordion',
					onclick: function () {
						editor.insertContent( '[accordion][collapse title="Accordion 1" open="true"]<p>Accordion 1 Content</p>[/collapse][collapse title="Accordion 2"]<p>Accordion 2 Content</p>[/collapse][/accordion]' );
					}
				}, {
					text: 'Collapsable Panel',
					onclick: function () {
						editor.insertContent( '[collapse title="Accordion Title"]<p>content</p>[/collapse]' );
					}
				} ]
			}, {
				text: 'Tab',
				menu: [ {
					text: 'Tabs',
					onclick: function () {
						editor.insertContent( '[tabs][tab title="Accordion 1" open="true"]<p>Tab 1 Content</p>[/tab][tab title="Tab 2"]<p>Tab 2 Content</p>[/tab][/tabs]' );
					}
				}, {
					text: 'Tab',
					onclick: function () {
						editor.insertContent( '[tab title="Tab Title"]<p>content</p>[/tab]' );
					}
				} ]
			}, {
				text: 'Panel',
				onclick: function () {
					editor.insertContent( '[panel title="Panel Title"]<p>Panel Content</p>[/panel]' );
				}
			}, {
				text: 'YouTube',
				onclick: function () {
					editor.insertContent( '[youtube url="https://www.youtube.com/watch?v=DPBU2SOSC5c"]' );
				}
			}, {
				text: 'Vimeo',
				onclick: function () {
					editor.insertContent( '[vimeo url="https://vimeo.com/44757617"]' );
				}
			} ]
		} );
	} );
} )();
