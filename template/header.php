<?php
namespace sPHP;

?>

<header>
	<a href="./?_Script=Home">Home</a>
	<a href="./?_Script=Management/Generic/Employee">Employee</a>
	<a href="./?_Script=Management/Generic/Salary">Salary</a>
	<a href="./?_Script=Management/Generic/Memo">Memo</a>
	<a href="./?_Script=Management/Generic/Shop">Shop</a>
	<a href="./?_Script=Management/Generic/Expense">Expense</a>
	<a href="./?_Script=User/SignIn">Sign in</a>
	<a href="./?_Script=User/SignOut">Sign out</a> | <a href="./?_Script=User/Profile"><?=$User->Name()?></a>
</header>

<main>
	<div class="Content">