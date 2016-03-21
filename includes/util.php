<?php

session_start();
//include '../../includes/vendor/autoload.php';



function make_form_raw($type, $tbname = false, $name = false,  $value = false){
	if($type == "text") {
		$form = "<input type='text' name='$tbname' VALUE='$value'>";
	}
	if($type == "list") {
		$form = "<select name='$tbname'>$value</select>";
	}
	elseif($type == "head"){
		$form = "<form method=post action=$tbname>";
	}
	elseif($type == "foot"){
		$form = "</form>";
	}
	elseif($type == "hide"){
		$form = "<input type='hidden' name='$tbname' value='$value'>";
	}
	elseif($type == 'submit'){
		$form = "<button type='submit' name='$tbname' value='$value' >$name</button>";
	}
	return $form;
}

function make_form($type, $tbname = false, $name = false,  $value = false){
	if($type == "text") {
		$form = "
				<div class='control-group'>
	                <label class='control-label' for='$tbname'><B>$name</B></label>
                    <div class='controls'><input type='text' name='$tbname' VALUE='$value' class='span6 disabled' id='username'></div>
	            </div>";
	}
	elseif($type == "textarea") {
		$form = "
				<div class='control-group'>
	                <label class='control-label' for='$tbname'><B>$name</B></label>
                    <div class='controls'><textarea name='$tbname'>$value</textarea></div>
	            </div>";
	}
	elseif($type == "list") {
		$form = "
				<div class='control-group'>
	                <label class='control-label' for='$tbname'><B>$name</B></label>
                    <div class='controls'><select name='$tbname'>$value</select></div>
	            </div>";
	}
	elseif($type == "head"){
		$form = "<form method=post action=$tbname id='edit-profile' class='form-horizontal'>";
	}
	elseif($type == "foot"){
		$form = "</form>";
	}
	elseif($type == "hide"){
		$form = "<input type='hidden' name='$tbname' value='$value'>";
	}
	elseif($type == 'submit'){
		$form = "<div class='form-actions'><button type='submit' class='btn btn-primary' name='$tbname' value='$value' >$name</button></div>";
	}
	echo $form;
}




function simple_header($name = false, $link = false){
	if($link){
		$tag = "<a href='{$link}'>Back</a> :: ";
	}
	echo "<div class='row'>
    <div class='span12'>
        <div class='widget-header'>
            <i class='icon-list-alt'></i>
            <h3>$tag $name</h3>
        </div> <!-- /widget-header -->
        <div class='info-box'>
";
}


function simple_footer(){
	echo "
ADM 1.04-Content of Medical Records
</div>

        </div>
    </div>
</div>

";
}


function table_search_header($name = false){
	echo "<div class='row'>
    <div class='span12'>
        <div class='widget-header'>
            <i class='icon-list-alt'></i>
            <h3>$name</h3>
        </div> <!-- /widget-header -->
        <div class='info-box'>

            <body>
            <div class='tables'>

                <p>
                    <label for='search'><strong>Enter keyword to search </strong></label><input type='text' id='search'/>
                </p>
                  <table class='table table-striped table-bordered' id='tblData'>
                        <tbody>
                ";
}



function table_search_footer(){
	echo "
            </tbody>
            </table>
            </div>
            <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script>
            <script type='text/javascript'>
                $(document).ready(function()
                {
                    $('#search').keyup(function()
                    {
                        searchTable($(this).val());
                    });
                });
                function searchTable(inputVal)
                {
                    var table = $('#tblData');
                    table.find('tr').each(function(index, row)
                    {
                        var allCells = $(row).find('td');
                        if(allCells.length > 0)
                        {
                            var found = false;
                            allCells.each(function(index, td)
                            {
                                var regExp = new RegExp(inputVal, 'i');
                                if(regExp.test($(td).text()))
                                {
                                    found = true;
                                    return false;
                                }
                            });
                            if(found == true)$(row).show();else $(row).hide();
                        }
                    });
                }
            </script>
            </body>

        </div>
    </div>
</div>

";
}

function table_header($name = false){
	echo "<div class='row'>
    <div class='span12'>
        <div class='widget-header'>
            <i class='icon-list-alt'></i>
            <h3>$name</h3>
        </div> <!-- /widget-header -->
        <div class='info-box'>

            <body>
            <div class='tables'>

                <p>
                    <label for='search'><strong>Enter keyword to search </strong></label><input type='text' id='search'/>
                </p>";
}

function table_footer(){
	echo "  </div>
            <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script>
            <script type='text/javascript'>
                $(document).ready(function()
                {
                    $('#search').keyup(function()
                    {
                        searchTable($(this).val());
                    });
                });
                function searchTable(inputVal)
                {
                    var table = $('#tblData');
                    table.find('tr').each(function(index, row)
                    {
                        var allCells = $(row).find('td');
                        if(allCells.length > 0)
                        {
                            var found = false;
                            allCells.each(function(index, td)
                            {
                                var regExp = new RegExp(inputVal, 'i');
                                if(regExp.test($(td).text()))
                                {
                                    found = true;
                                    return false;
                                }
                            });
                            if(found == true)$(row).show();else $(row).hide();
                        }
                    });
                }
            </script>
            </body>

        </div>
    </div>
</div>

";
}

function get_tabs_css(){
	echo "<style type=\"text/css\" >
		*{
			margin:0;
			padding:0;
			list-style:none;
			border:none;
		}


		div.domtab{
			padding:0 0em;
			width:80%;
			font-size:90%;

		}
		ul.domtabs{
			float:left;
			width:100%;
			margin:0em 0 0 0;
		}
		ul.domtabs li{
			float:left;
			padding:0 .5em 0 0;
		}
		ul.domtabs a:link,
		ul.domtabs a:visited,
		ul.domtabs a:active,
		ul.domtabs a:hover{
			width:6em;
			padding:.4em .9em;
			display:block;
			background:white;
			border-style: solid;
			border-width:1px;
			border-color: #000000;
			height:1em;
			font-weight:bold;
			text-decoration:none;
		}

		ul.domtabs a:hover{
			background:#981e32;
			color: white;
		}
		div.domtab div{
			clear:both;
			width:auto;
			background:white;

			padding:0em 0em;
		}
		ul.domtabs li.active a:link,
		ul.domtabs li.active a:visited,
		ul.domtabs li.active a:active,
		ul.domtabs li.active a:hover{
			background:#981e32;
			;
			color:white;

		}
		#domtabprintview{
			float:right;
			padding-right:1em;
			text-align:right;
		}
		#domtabprintview a:link,
		#domtabprintview a:visited,
		#domtabprintview a:active,
		#domtabprintview a:hover{
			color:white;
		}
		p{
			margin:0 0 .5em 0;
			line-height:1.3em;
		}

		pre{
			font-size:1.2em;
			padding:1em;
		}
		div.domtab div a:link,
		div.domtab div a:visited,
		div.domtab div a:active
		{
			color:#981e32;
			display:block;
			padding:1em .5em;
			font-weight:bold;
			font-size:1.3em;
		}


/* other scheme! */
#other{
	font-size:.8em;
	margin-left:.3em;
	width:60em;
	margin-bottom:3em;
	float:left;
}
div#other.domtab div{
	clear:both;
	width:54em;
	background:#981e32;
	color:#000000;
	padding:1em 1em;
}

#other ul.domtabs a:hover{
	background:#981e32;
}
div#other ul.domtabs li.active a:link,
div#other ul.domtabs li.active a:visited,
div#other ul.domtabs li.active a:active,
div#other ul.domtabs li.active a:hover{
	background:peachpuff;
	color:#fff;
}
#other div{
	float:left;
}
ul.prevnext{
	float:left;
	width:100%;
}
ul.prevnext li{
	float:left;
	width:49%;
}
ul.prevnext li.next{
	float:right;
	text-align:right;
}


				</style>";
}
