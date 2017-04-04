<script type="text/javascript">
	document.getElementById("btnPrint").onclick = function() {
	    printElement(document.getElementById("printThis"));
	    //printElement(document.getElementById("familyHistoryChart"), true, "<hr />");
	    window.print();
	}

	function printElement(elem, append, delimiter) {
	    var domClone = elem.cloneNode(true);

	    var $printSection = document.getElementById("printSection");

	    if (!$printSection) {
	        var $printSection = document.createElement("div");
	        $printSection.id = "printSection";
	        document.body.appendChild($printSection);
	    }

	    if (append !== true) {
	        $printSection.innerHTML = "";
	    }

	    else if (append === true) {
	        if (typeof(delimiter) === "string") {
	            $printSection.innerHTML += delimiter;
	        }
	        else if (typeof(delimiter) === "object") {
	            $printSection.appendChlid(delimiter);
	        }
	    }

	    $printSection.appendChild(domClone);
	}
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<style type="text/css">
	@media screen {
	  #printSection {
	      display: none;
	  }
	}

	@media print {
	  body * {
	    visibility:hidden;
	  }
	  #printSection, #printSection * {
	    visibility:visible;
	  }
	  #printSection {
	    position:absolute;
	    left:0;
	    top:0;
	  }
	}
	@page {
		size:A4;
		margin: 0;
	}
</style>