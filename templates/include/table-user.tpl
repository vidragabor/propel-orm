<h2 class="content-head is-center">{$title}</h2>
<div class="content-center">
	<table class="pure-table pure-table-horizontal">
		<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Login counter</th>
			<th>Blocked</th>
		</tr>
		</thead>
		<tbody>
        {foreach $userList as $user}
			<tr>
				<td>{$user->getId()}</td>
				<td>{$user->getFirstName()} {$user->getLastName()}</td>
				<td>{$user->getEmail()}</td>
				<td class="is-center">{$user->getLoginCounter()}</td>
				<td class="is-center">{if $user->isBlocked()} yes {else} no {/if}</td>
			</tr>
        {/foreach}
		</tbody>
	</table>
</div>