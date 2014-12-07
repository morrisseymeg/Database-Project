<form>
<input type="submit" value="Click me" onclick="afunction(); return false;" />
</form>
<script type="text/javascript" src="jquery.min.js"></script>
<script>
wDay = {abc: "123", 
        cde: "456"
       };

function afunction() {
	$.ajax({ type: "POST",
             url: "AddtoDatabase.php",
             data: wDay,
             success: function(response) {
             	alert(response);
             }
    });

}

</script>
<p>
	
</p>