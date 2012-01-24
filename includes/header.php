<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  if ($messageStack->size('header') > 0) {
    echo '<div class="grid_24">' . $messageStack->output('header') . '</div>';
  }
?>

<div id="mobileheader" class="mobile_element">
	<ul class="group">
		<li><a href="<?php echo tep_href_link(FILENAME_DEFAULT); ?>"><?php echo HEADER_TITLE_TOP; ?></a></li>
		<li>&bull;</li>
		<li><a href="<?php echo tep_href_link(FILENAME_SHOPPING_CART); ?>"><?php echo HEADER_TITLE_CART_CONTENTS; ?></a></li>
		<li>&bull;</li>
		<li><a href="<?php echo tep_href_link(FILENAME_ACCOUNT); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a></li>
		<li>&bull;</li>
		<li><?php include(DIR_WS_MOBILE.'categories.php'); ?></li>
	</ul>
</div>
<?php
if ($cart->count_contents() > 0) {
	echo '<div class="mobile_element group" id="mobileheader_note">
			 <a href="'.tep_href_link(FILENAME_CHECKOUT_SHIPPING).'" class="btn success" style="float:right;">Checkout</a>
			 <div style="float:left; margin-top:5px;">
			 	Total: '.$currencies->format($cart->show_total()).' &bull; Item(s): '.$cart->count_contents().'
			 </div>
		  </div>'; 
}


?>

	

<div id="header" class="grid_24">
	<?php
	// default logo which hides when viewed on a mobile device.
	echo '<div id="storeLogo" class="non_mobile_element"><a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image(DIR_WS_IMAGES . 'store_logo.png', STORE_NAME) . '</a></div>';
	
	// only show logo on mobile version if it's the homepage.
	$filename = basename($_SERVER['PHP_SELF']);
	if($filename == 'index.php') {
		echo '<div id="storeLogo" class="mobile_element"><a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image(DIR_WS_IMAGES . 'store_logo.png', STORE_NAME) . '</a></div>';
	}
	?>
  

  <div id="headerShortcuts">
<?php
  echo tep_draw_button(HEADER_TITLE_CART_CONTENTS . ($cart->count_contents() > 0 ? ' (' . $cart->count_contents() . ')' : ''), 'cart', tep_href_link(FILENAME_SHOPPING_CART)) .
       tep_draw_button(HEADER_TITLE_CHECKOUT, 'triangle-1-e', tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL')) .
       tep_draw_button(HEADER_TITLE_MY_ACCOUNT, 'person', tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));

  if (tep_session_is_registered('customer_id')) {
    echo tep_draw_button(HEADER_TITLE_LOGOFF, null, tep_href_link(FILENAME_LOGOFF, '', 'SSL'));
  }
?>
  </div>

<script type="text/javascript">
  $("#headerShortcuts").buttonset();
</script>
</div>

<?php
  if (isset($HTTP_GET_VARS['error_message']) && tep_not_null($HTTP_GET_VARS['error_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerError">
    <td class="headerError"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['error_message']))); ?></td>
  </tr>
</table>
<?php
  }

  if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerInfo">
    <td class="headerInfo"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['info_message']))); ?></td>
  </tr>
</table>
<?php
  }
?>

<div class="grid_24 ui-widget infoBoxContainer non_mobile_element">
  <div class="ui-widget-header infoBoxHeading"><?php echo '&nbsp;&nbsp;' . $breadcrumb->trail(' &raquo; '); ?></div>
</div>
