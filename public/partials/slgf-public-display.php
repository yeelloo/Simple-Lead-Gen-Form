<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div class="slgfContainer">
	<h2><?php esc_html_e($title, 'slgf') ?></h2>
	<form type="POST" class="slgfForm" id="slgf-<?php echo $id;?>">
		<div class="slgfGroup">
			<label for="name"><?php esc_html_e($name, 'slgf') ?></label>
		    <input type="text" id="slgfName" name="name" placeholder="<?php esc_html_e($name, 'slgf') ?>" maxlength="<?php echo $nameMax; ?>">
		</div>

		<div class="slgfGroup">
		    <label for="phone"><?php esc_html_e($phone, 'slgf') ?></label>
		    <input type="text" id="slgfPhone" name="phone" placeholder="<?php esc_html_e($phone, 'slgf') ?>" maxlength="<?php echo $phoneMax; ?>">
		</div>

		<div class="slgfGroup">
		    <label for="email"><?php esc_html_e($email, 'slgf') ?></label>
		    <input type="email" id="slgfEmail" name="email" placeholder="<?php esc_html_e($email, 'slgf') ?>" maxlength="<?php echo $emailMax; ?>">
		</div>

		<div class="slgfGroup">
		    <label for="budget"><?php esc_html_e($budget, 'slgf') ?></label>
		    <input type="text" id="slgfBudget" name="budget" placeholder="<?php esc_html_e($budget, 'slgf') ?>" maxlength="<?php echo $messageCols; ?>">
		</div>

		<div class="slgfGroup">
		    <textarea id="slgfMessage" name="message" placeholder="<?php esc_html_e($message, 'slgf') ?>" rows="<?php echo $messageRows; ?>" cols="<?php echo $budgetMax; ?>"></textarea>
		</div>

		<div class="slgfNotice"></div>
		<input type="hidden" name="slfgDatetime" id="slfgDatetime" value="<?php echo $dateTime;?>">
	    <input type="submit" value="Submit" id="slgfSubmit" data-id="<?php echo $id;?>">
	</form>	
</div>