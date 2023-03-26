<div class="login-wrap">
    <div class="login-html">
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <form class="login-form" method="POST" action="<?= base_url('Home/register'); ?>">

            <div class="sign-up-htm">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input" name="username">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password" name="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Repeat Password</label>
                    <input id="pass" type="password" class="input" data-type="password" name="passwordconfirm">
                </div>
                <div class="group">
                    <label for="nama" class="label">Nama</label>
                    <input id="nama" type="nama" class="input" data-type="nama" name="nama">
                </div>
                <div class="group">
                    <button type="submit" class="btn btn-primary text-uppercase" type="submit">Register</button>
                </div>
                <div class="foot-lnk">
                    <a href="<?= base_url('home/login'); ?>">Already Member?</a>
                </div>
            </div>
        </form>
    </div>
</div>