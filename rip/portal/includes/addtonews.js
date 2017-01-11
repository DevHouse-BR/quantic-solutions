function addnews(){
	var name = document.forms[0].nome.value;
	var e_mail = document.forms[0].email.value;
	window.open('addtonews.php?nome=' + name + '&email=' + e_mail, 'Newsletter', 'width=341,height=306,status=no,resizable=no,top=30,left=100,dependent=yes,alwaysRaised=yes');
}