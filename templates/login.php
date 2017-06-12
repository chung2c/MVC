<div style="text-align: center;">
				<form action="" method="post" accept-charset="utf-8">
					<label for="username">User name or Email</label>
					</br>
					<input type="text" id="username" name="username" placeholder="Enter your user or email">
					</br>
					<label for="password">Password</label>
					</br>
					<input type="password" id="password" name="password">
					</br>
					</br>
					<button type="submit">Login</button>
					<button type="reset">Clear</button>
					</br>
					<span style="color: red;">
						<?php
							if(isset($messenger)){
								?>
									<?=$messenger?>
								<?php
							}
						?>
					</span>
				</form>
				
			</div>