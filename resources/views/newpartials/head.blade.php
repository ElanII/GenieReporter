
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Genie Reporter - {{Config::get('constants.clinic')}} - {{$title}}</title>
<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=b05357026107a2e3ca397f642d976192">
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">

<script type="text/javascript" src="/media/js/site.js?_=9a83ad61fa12260d710e54eb5f3203dc">
</script>
<script type="text/javascript" src="/media/js/dynamic.php?comments-page=examples%2Fstyling%2Fbootstrap.html" async>
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js">
</script>
<script type="text/javascript" language="javascript" src="../resources/demo.js">
</script>
<script type="text/javascript" class="init">
	$(function() {
	  otable = $('#mytable').dataTable({
            dom:'Bfrtip',
            lengthMenu:[
                [25,50,100,-1],
                ['25','50','100','All']
            ],
            buttons:[
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '8pt' )
                        .prepend(
                            '<img src="bhgpsc_rgb3.jpg" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            },
            'pageLength',
            'excelFlash',
            'pdfFlash'
            ],
            "iDisplayLength": 25,
            "aaSorting" : [[1, "desc"]],
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                if ( aData[0] == "1" )
                {
                    $('td', nRow).css('background-color', 'White');
                }
                else if ( aData[0] == "0" )
                {
                    $('td', nRow).css('color', '#B0B0B0');
                    $('td', nRow).css('background-color', 'White');
                }
            }
        });
	})

	function filterme() {
	  //build a regex filter string with an or(|) condition
	  //use radio values
	  var frees = $('input:radio[name="free"]:checked')[0].value;
	  //now filter in column 0, with no regex, no smart filtering, no inputbox,not case sensitive
	  otable.fnFilter(frees, 0, false, false, false, false);
	}
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>