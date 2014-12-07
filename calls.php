<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rotating Over Time Call List</title>
    <link rel="stylesheet" href="themes/basic.min.css" />
    <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.3/jquery.mobile.structure-1.4.3.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>

        <script>
            $(document).ready(function(){
                //click or swipe
                //comment out the one you don't want 
                $("#listview").on('click','li',move);
                $("#listview").on('swipe','li',move);
             
                $("button").click(function(){get_json()});   
                get_json();

                $("#listview").on('swipe','li',function(){
                    var pid=$(this).attr("pid");
                    var name=$(this).attr("name");
                    var phone=$(this).attr("phone");
                    var rank=$(this).attr("rank");

                    $("#popnote").html(name + " <a href='tel:"+phone+"'>"+phone+"</a>");
                    $("#poptitle").html(name);
                    $.mobile.changePage( "#popup", { role: "dialog" } );
                    
                });

                
            });


            function move(event){
                var pid=$(this).attr("pid");
                var name=$(this).attr("name");
                var phone=$(this).attr("phone");
                var rank=$(this).attr("rank");

                $("[pid='" + pid + "']").remove();
                $.get( "update.php", {
                    pid:pid
                }).done(function( data ) {
                    get_json();
                });

                $.get( "log.php", {
                    name:name,
                    phone:phone,
                    rank:rank
                });

            }

            function get_json(){
                var url="read.php";
                $.getJSON( url, function( data ) {
                    $('ul').empty();
                    for(var i = 0;i<data.length;i++){
                        var pid=data[i].pid;
                        var name=data[i].name;
                        var phone=data[i].phone;
                        var rank=data[i].rank;

                        var info = '<li pid="' + pid + '" ';
                        info += 'name="'+name+'" ';
                        info += 'phone="'+phone+'" ';
                        info += 'rank="'+rank+'" ';
                        info += ' class="rm_item"><a>';
                        info += name + " --- " + phone;
                        info += '</a></li>';
                        $('ul').append(info);
                    }

                    $('ul').listview('refresh');             
                });
            }

            
        </script>
</head>
<body>
    <div data-role="page" data-theme="a">
        <div data-role="header" data-position="inline">
            <h1>Over Time Call List</h1>
        </div>
        <div data-role="content" data-theme="a">

                    <ul id="listview" data-role="listview" data-filter="false" data-inset="true">

                    </ul>
 
        </div>
    </div>

<!--popup-->
    <div data-role="page" data-theme="a" id="popup">
        <div data-role="header" data-position="inline">
            <h1 id="poptitle">Notes</h1>
        </div>

        <div data-role="content" data-theme="a">
            <label id="popnote"></label>
        </div>
    </div>

</body>
</html>
