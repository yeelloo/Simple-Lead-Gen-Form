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
		    <input type="text" id="slgfName" name="name" placeholder="<?php esc_html_e($name, 'slgf') ?>" maxlength="<?php echo $nameMax; ?>" value="Lorem ipsum <?php echo $id;?>">
		</div>

		<div class="slgfGroup">
		    <label for="phone"><?php esc_html_e($phone, 'slgf') ?></label>
		    <input type="text" id="slgfPhone" name="phone" placeholder="<?php esc_html_e($phone, 'slgf') ?>" maxlength="<?php echo $phoneMax; ?>" value="334 234 3234">
		</div>

		<div class="slgfGroup">
		    <label for="email"><?php esc_html_e($email, 'slgf') ?></label>
		    <input type="email" id="slgfEmail" name="email" placeholder="<?php esc_html_e($email, 'slgf') ?>" maxlength="<?php echo $emailMax; ?>" value="example@gmail.com">
		</div>

		<div class="slgfGroup">
		    <label for="budget"><?php esc_html_e($budget, 'slgf') ?></label>
		    <input type="text" id="slgfBudget" name="budget" placeholder="<?php esc_html_e($budget, 'slgf') ?>" value="100" maxlength="<?php echo $messageCols; ?>">
		</div>

		<div class="slgfGroup">
		    <textarea id="slgfMessage" name="message" placeholder="<?php esc_html_e($message, 'slgf') ?>" rows="<?php echo $messageRows; ?>" cols="<?php echo $budgetMax; ?>">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam accusamus, et asperiores eius. Rerum, reprehenderit. Blanditiis, obcaecati odit recusandae, impedit amet assumenda earum eligendi veniam saepe reprehenderit neque, temporibus consequuntur.</textarea>
		</div>

		<div class="slgfNotice">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut laudantium sed sint, perferendis voluptates nesciunt, quaerat, quod ducimus, numquam nisi in rerum veritatis. Repudiandae eius rem, placeat, veritatis quo eveniet.</div>
		<input type="hidden" name="slfgDatetime" id="slfgDatetime" value="<?php echo $dateTime;?>">
	    <input type="submit" value="Submit" id="slgfSubmit" data-id="<?php echo $id;?>">
	</form>	
</div>