<?php
/**
 * Adds a CSS cariable --the-scrollbar-width to prevent hirizontal scroll from appearing when blocks are fullwidth
 */
require_once( APURI_BLOCKS_PATH . 'inc/no-direct.php' ); 

// The thing
function apuri_fullwidth_blocks_fix() {
	?>
	<script id="modify-fullwidth-blocks">
		function getTheScroolBarWidth() {
			document.documentElement.style.setProperty('--the-scrollbar-width', (window.innerWidth - document.documentElement.clientWidth) + "px");
		}
		window.addEventListener('resize', getTheScroolBarWidth, false); // watch for resizing
    document.addEventListener('DOMContentLoaded', getTheScroolBarWidth, false); // dom load
    window.addEventListener('load', getTheScroolBarWidth); // with assets
		</script>
	<?php
};
add_action( 'wp_footer' , 'apuri_fullwidth_blocks_fix', 999);