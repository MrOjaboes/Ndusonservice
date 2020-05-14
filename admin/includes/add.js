
  <script type="text/javascript">
function create_rows() {
    // Find a <table> element with id="myTable":
                var table = document.getElementById("product");
        
// Create an empty <tr> element and add it to the 1st position of the table:
        var row = table.insertRow(1);
        
// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);  
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);

                cell1.innerHTML = "<input size='' step='1' min='0' name='capacity_one[]' type='text' id='quantity' onClick='amount();'/> "
                cell2.innerHTML = "<input size='' step='1' min='0' name='ullage_one[]' type='text' id='quantity' onClick='amount();'/>";
                cell3.innerHTML = "<input type='text' step='1' min='0' id='quantity' value='' name='capacity_two[]'>";
                cell4.innerHTML = "<span> <input type='text' id='quantity' name='ullage_two[]' class='price'></span>";
                cell5.innerHTML = "<span><input type='text' id='quantity' name='capacity_three[]' value=''></span>";
                cell6.innerHTML = "<span><input type='text' id='quantity' name='ullage_three[]' value=''></span>";                 
                cell7.innerHTML = "<a onClick='deleteRow(this);' style='cursor:pointer'><span class='glyphicon glyphicon-remove'></span></a>";
    }
	
	
	//deleteRow
	function deleteRow(btndel) {
			if (typeof(btndel) == "object") {
        $(btndel).closest("tr").remove();
    } else {
        return false;
    }
		}
</script>