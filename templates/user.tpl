{include 'include/header.tpl'}
<div class="content">
    {include 'include/table-user.tpl' title="All users" userList=$allUsers}
    {include 'include/table-user.tpl' title="All Anna" userList=$allAnnaUsers}
    {include 'include/table-user.tpl' title="@vidragabor.hu" userList=$vidragaborEmailUsers}
    {include 'include/table-user.tpl' title="2 <= ID <= 4" userList=$minMaxIdUsers}
    {include 'include/table-user.tpl' title="by login counter" userList=$allUsersOrderByLoginCounter}
	<h2 class="content-head is-center">Create user</h2>
	<div class="content-center">
		<form class="pure-form pure-form-aligned" method="POST" action="user/create">
			<fieldset>
				<legend>New user</legend>
				<div class="pure-control-group">
					<input name="first_name" type="text" placeholder="First name">
					<input name="last_name" type="text" placeholder="Last name">
					<input name="email" type="email" placeholder="Email Address">
					<input name="password" type="password" placeholder="Password">
				</div>
				<div class="pure-controls">
					<button type="submit" class="pure-button pure-button-primary">Submit</button>
				</div>
			</fieldset>
		</form>
	</div>
</div>
{include 'include/footer.tpl'}
</body>
</html>