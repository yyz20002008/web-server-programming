<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AutoComplete</title>
<script type="text/javascript" src="jquery-1.2.1.pack.js"></script>
<script type="text/javascript">
        function lookup(inputString) {
                if(inputString.length == 0) {
                        // Hide the suggestion box.
                        $('#suggestions').hide();
                } else {
                        $.post("data.php", {queryString: ""+inputString+""}, function(data){
                                if(data.length >0) {
                                        $('#suggestions').show();
                                        $('#autoSuggestionsList').html(data);
                                }
                        });
                }
        } // lookup
        
        function fill(thisValue) {
                $('#inputString').val(thisValue);
                setTimeout("$('#suggestions').hide();", 200);
        }
</script>

<link rel="stylesheet" type="text/css" href="mystyle.css" />

</head>

<body>
<h1>
In Class Final<br></h1>
        <div>
                <form >
                        <div>
                                <h1><b>Input States:</b></h1>
                                <br />
                                <input type="text" autocomplete="off" size="30" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
                        </div>
                        
                        <div class="suggestionsBox" id="suggestions" style="display: none;">
                                <img src="upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                <div class="suggestionList" id="autoSuggestionsList">
                                        &nbsp;
                                </div>
                        </div>
                </form>
        </div>
<h1><a colspan="1" style="background-color:#FFA500;text-align:center;">
Copyright © 2011 SUNY New Paltz YanzhaoYang</a>
</h1>
</body>
</html>
