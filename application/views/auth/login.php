<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<form class="login-form" method="POST" action="<?= base_url('Home/login'); ?>">
			<div class="sign-in-htm">
				<?= $this->session->set_flashdata('message') ?>
				<div class="group">
					<label for="username" class="label">Username</label>
					<input id="username" type="text" class="input" name="username" value="<?= set_value('username') ?>">
					<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="group">
					<label for="password" class="label">Password</label>
					<input id="password" type="password" class="input" data-type="password" name="password"
						value="<?= set_value('password') ?>">
					<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class=" group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<button type="submit" class="btn btn-primary text-uppercase" type="submit">sign-in</button>
				</div>
				<div class="foot-lnk">
					<a href="<?= base_url('home/register'); ?>">Create A New Account?</a>
				</div>
			</div>
		</form>
	</div>
</div>