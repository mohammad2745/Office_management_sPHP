<?php
namespace sPHP;

function AllowScriptAccess($Script, $Application){
	$Result = true;

	$Allow["Guest"] = ListToArray(strtolower("User/SignIn, User/SignInAction, User/SignUp, User/SignUpAction, User/Activate, Home, Contact, Test, FAQ, About"));
	$Allow["Member"] = ListToArray(strtolower("Student/List, Student, Event, User/Profile, User/ProfileUpdate, User/SignOut, Home, Contact, Test, FAQ, About"));

	if($Application->Session()->IsGuest() && !in_array($Script, $Allow["Guest"]))$Result = "Home";
	if(!$Application->Session()->User()->InGroup("ADMINISTRATOR") && $Application->Session()->User()->InGroup("MEMBER") && !in_array($Script, $Allow["Member"]))$Result = "Home";

	return $Result;
}
?>