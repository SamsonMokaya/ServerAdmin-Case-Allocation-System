<?php 

if (isset($_POST['profile'])) {

header('location:profile.php');


}

if (isset($_POST['lawyerprofile'])) {

header('location:lawyerprofile.php');


}

if (isset($_POST['case'])) {

header('location:case.php');


}
if (isset($_POST['registered'])) {

header('location:takencases.php');


}
if (isset($_POST['recommended'])) {

header('location:pendingcases.php');


}


if (isset($_POST['pending'])) {

header('location:civilianpendingcases.php');


}


if (isset($_POST['law'])) {

header('location:mylawyer.php');


}
if (isset($_POST['report'])) {

header('location:report.php');


}
if (isset($_POST['syreport'])) {

    header('location:syreport.php');
    
    
    }


?>