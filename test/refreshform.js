
// Returns successful data submission message when the entered information is stored in database.
$.post("refreshform.php", {
name1: name,
email1: email,
contact1: contact,
gender1: gender,
msg1: msg
}, function(data) {
alert(data);
$('#form')[0].reset(); // To reset form fields
}); 
