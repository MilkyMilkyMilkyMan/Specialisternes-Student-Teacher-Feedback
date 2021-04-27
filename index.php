<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Character Sheet Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
	var skillTree = [
		["warrior","Kriger","Hardware","warrior.png",0,
			[["pc","Udholdenhed","PC Hardware","endurance.png",0],
			["mac","Smertetærskel","Mac Hardware","painthreshhol.png",0]
			]
		],
		["bard","Barde","Sociale Færdigheder","bard.png",0,
			[["manners","Høflighed","Almen Dannelse","manners.png",0],
			["mentor","Mentor","Træning og Øvelse i at være Mentor","mentor.png",0]
			]
		],
		["ranger","Skovvogter","Design","ranger.png",0,
			[["ui","Opfattelse","Brugergrænseflader","skill.png",0],
			["print","Finde Spor","Tryksager","skill.png",0],
			["2d","Skjule Spor","2d Grafik & Billedemanipulering","skill.png",0],
			["3d","Overlevelses Håndværk","3D modelring & Animation","skill.png",0]
			]
		],
		["wizard","Troldmand","Software","wizard.png",0,
			[["web","Element Magi","Hjemmesider & Apps","webcoding.png",0],
			["network","Astral Magi","Netværkskode & Protokoller","networkCode.png",0],
			["enchanting","Fortryllelse","Backend & Databaser","skill.png",0],
			["illusion","Illusionisme","Spil Logik","skill.png",0]
			],
			["mentalism","Metalisme","Datavisualisering & BI","skill.png",0]
		]
	];
	var character = { name: 'Jens Jensen' };
	$(document).ready(function(){
		$("h1").text(".: "+character.name+" :.");
		$(skillTree).each(function(){
			var groupname = this[0];
			$("#skillTree").append('<div id="'+groupname+'"><div class="skillImg" style="background-image:url(GUI/Icons/'+this[3]+')"></div><div style="flex:1"><h2>'+this[1]+' <span>( '+this[2]+' )</span></h2><input id="input'+groupname+'" value="'+this[4]+'"><a href="#" class="decrease">-</a><div class="bar"></div><a href="#" class="increase">+</a><div class="subskills"></div></div></div>');
			if ( this[5].length )
			{
				$(this[5]).each(function(){
					$("#"+groupname+" .subskills").append('<div id="'+this[0]+'"><div class="subskillImg" style="background-image:url(GUI/Icons/'+this[3]+')"></div><div><h2>'+this[1]+' <span>( '+this[2]+' )</span></h2><input id="input'+this[0]+'" value="'+this[4]+'"><a href="#" class="decrease">-</a><div class="bar"></div><a href="#" class="increase">+</a></div></div>');
				});	
			}
		});
		$(".increase").click(function(){
			var name = $(this).parent().parent().attr("id");
			var value = parseInt($("#input"+name).val());
			$("#input"+name).val( value+1 );
			renderBar(name);
			return false;
		});
		$(".decrease").click(function(){
			var name = $(this).parent().parent().attr("id");
			var value = parseInt($("#input"+name).val());
			if ( value > 0 ) value--;
			$("#input"+name).val( value );
			renderBar(name);
			return false;
		});
	});
	function renderBar( name )
	{
		var value = $("#input"+name).val();
		var percentage = value*30;
		if ( percentage > 300 ) {
			percentage = 300;
		}
		$("#"+name+" > div > .bar").html('<div style="width:'+percentage+'px"></div>');
	}
</script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
<style>
* {
	padding:0px;
	margin:0px;
}
body {
	background:url(GUI/parchment.jpg);
	font-family: 'MedievalSharp', cursive;
}
section {
	max-width:900px;
	margin:20px auto;
	background:rgba(0,0,0,0.1);
	border: rgba(0,0,0,0.2) 2px solid;
	border-radius:15px;
}
h1 {
	color: black;
	-webkit-text-fill-color: white;
	-webkit-text-stroke-width: 1px;
	-webkit-text-stroke-color: black;
	font-size: 64px;
	text-shadow: 4px 4px 2px rgba(0, 0, 0, 0.8);
}
h2 span {
	font-size:0.75em;
	font-weight:100;
}
.skillImg {
	height: 150px;
	width: 150px;
	background-size:contain;
	background-repeat:no-repeat;
	background-position:center center;
}
.subskillImg {
	height: 50px;
	width: 50px;
	background-size:contain;
	background-repeat:no-repeat;
	background-position:center center;
	float:left;
	margin-right:10px;
}
#skillTree > div {
	display:flex;
	width:100%;
	padding:30px;
}
#skillTree input {
	display:none;
}
#skillTree .increase, #skillTree .decrease {
	display:block;
	height: 30px;
	width: 30px;
	text-align:center;
	font-size:30px;
	float:left;
	text-decoration:none;
	color:#000;
	background:#960;
	border:#930 1px solid;
}
#skillTree .bar {
	width: 300px;
	height: 30px;
	background:rgba(0,0,0,0.2);
	border: rgba(0,0,0,0.4) 1px solid;
	float:left;
}
#skillTree .bar div {
	height: 30px;
	background: rgba(55,255,101,0.2);
	background: linear-gradient(0deg, rgba(55,255,101,0.5) 0%, rgba(170,235,61,0.5) 50%, rgba(0,212,255,0.5) 100%);
	border-top-right-radius:15px;
	border-bottom-right-radius:15px;
}
#skillTree .subskills {
	clear:both;
	padding-left:25px;
}
#skillTree .subskills > div {
	padding:30px;
	clear:both;
}
</style>
</head>

<body>
    <section>
        <div style="display:flex;">
            <div><img src="GUI/headshot/headshot2.jpg" style="margin:15px;height:250px;"></div>
            <div style="padding:15px;">
            <h1>.: char name :.</h1>
            </div>
        </div>
        <div id="skillTree"></div>
        <ol style="padding:20px 50px;">
        	<li>Har deltaget i grundliggende Teori undervisning</li>
        	<li>Har forsøgt kopieret materiale i dette fag</li>
            <li>Har deltaget i praktisk undervisning</li>
            <li>Har selv lavet et lille projekt</li>
            <li>Kan demonstrere fuld forsåelse for grundteori</li>
            <li>Har lavet fuldt fungerende Projekt uden hjælp</li>
            <li>Kan demonstrere forståelse for advanceret teori</li>
            <li>Fungerende projekt, hvor anden del er lavet af en anden, sammen</li>
            <li>Fungerende projekt, hvor anden del er lavet af en anden, andet sted</li>
            <li>Fuldt fungerende stort projekt</li>
            <b>Alt over 10 kommer fra projekter ude fra</b>
        </ol>
    </section>
</body>
</html>