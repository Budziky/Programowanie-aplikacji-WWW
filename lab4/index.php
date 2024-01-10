<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Największe mosty świata</title>
    <style>
        #container {
            width: 80%;
            margin: auto;
            background-color: white;
            padding: 20px;
        }

        .menu {
            background-color: #333;
            overflow: hidden;
        }
        .menu a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .menu a:hover {
            background-color: #ddd;
            color: black;
        }
        h1, h2 {
            color: #333;
        }
		
		.bg {
            background-image: url('img/tlo1.png');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
	<script src="js/kolorujtlo.js" type="text/javascript"></script>
	<script src="js/timedate.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css" />
</head>
<body onload="startclock()">

	<form method="post" name="background">
		<p class="highlighted-text">Wybierz kolor tła:</p>
		<input type="button" value="zółty" onclick="changeBackground('#FFF000')">
		<input type="button" value="czarny" onclick="changeBackground('#000000')">
		<input type="button" value="biały" onclick="changeBackground('#ffffff')">
		<input type="button" value="zielony" onclick="changeBackground('#00FF00')">
		<input type="button" value="niebieski" onclick="changeBackground('#0000FF')">
		<input type="button" value="pomarańczowy" onclick="changeBackground('#FF8000')">
		<input type="button" value="szary" onclick="changeBackground('c0c0c0')">
		<input type="button" value="czerwony" onclick="changeBackground('#FF0000')">
	</form>
	
	
	<div id="zegarek"></div>
	<div id="data"></div>
	
	
<table>
    <th>
    <th><div id="animacjaTestowa1" class="test-block">Kliknij, aby powiększyć >></div>

        <script>
            $("#animacjaTestowa1").on("click", function () {
                $(this).animate(
                    {
                        width: "500px",
                        opacity: 0.4,
                        fontSize: "3em",
                        borderWidth:"10px"
                    },1500);
            });
        </script>
    </th>
    <th>
        <div id="animacjaTestowa2" class="test-block">Najedź kursorem, aby powiększyć >></div>

        <script>
            $("#animacjaTestowa2").on(
                {
                    "mouseover": function () {
                        $(this).animate(
                            {
                                width: 300
                            }, 800);
                        );
                    },
                    "mouseout" : function () {
                        $(this).animate(
                            {
                                width: 200
                            }, 800);
                        )
                    }
                }
            );
        </script>
    </th>

    <th>
        <div id="animacjaTestowa3" class="test-block"> Kliknij, aby powiększyć bardziej >></div>

        <script>
            $("#animacjaTestowa3").on("click", function () {
                if (!$(this).is(":animated")) {
                    $(this).animate({
                        width: "+=" + 50,
                        height: "+=" + 10,
                        opacity: "-=" + 0.1,
                        duration: 3000
                    });
                }
            });
        </script>
    </th>
</table>
	
    <div id="container">
        <div class="menu">
            <a href="index.html">Home</a>
            <a href="html/azja.html">Mosty w Azji</a>
            <a href="html/amerykapolnocna.html">Mosty w Ameryce Północnej</a>
            <a href="html/europa.html">Mosty w Europie</a>
			<a href="html/galeria.html">Galeria zdjęć</a>
            <a href="html/kontakt.html">Kontakt</a>
        </div>
        <h1>Podstawowe informacje o mostach</h1>
			<div class="bg">
					<p>
						<b>Most</b> – rodzaj przeprawy w postaci budowli inżynierskiej, której konstrukcja pozwala na pokonanie przeszkody wodnej lub lądowej skonstruowana w taki sposób, że pod nią pozostaje wolna przestrzeń (w odróżnieniu od nasypu). 
						Przęsłem mostu nazywa się element konstrukcyjny łączący dwie podpory lub przestrzeń między nimi.<br>
						<img src="img/most1.jpg" style="float:right" width="300" height="200">

						Mosty dzieli się na:<br>
							
						<ul>
						<li>przepusty – budowle mostowe prowadzone przez nasypy (według innych definicji są to niewielkie mosty do rozpiętości 2-3 metrów)</li>
						<li>mosty rzeczne – nad przeszkodami wodnymi (rzeki, jeziora, zatoki, morskie cieśniny itp.), popularnie zwane mostami</li>
						<li>mosty inundacyjne (zalewowe) – przęsła lub mosty nad terenami zalewowymi</li>
						<li>wiadukty – nad suchymi przeszkodami (doliny, wąwozy), również nad drogowymi i kolejowymi trasami komunikacyjnymi</li>
						<li>estakady – nad terenami zabudowanymi.</li>
						</ul>
						<b>Klasyfikacja mostów</b><br>
							
						Ze względu na rodzaj drogi prowadzonej po moście dzielone są one następująco:<br>
						<ul>
						<li>drogowe – przez most prowadzony jest ruch komunikacji samochodowej</li>
						<li>kolejowe – przez most prowadzona jest trasa kolejowa</li>
						<img src="img/most2.jpg" style="float:right" width="300" height="200">
						<li>wodne (akwedukty) – przez most prowadzony jest kanał wodny, bądź grawitacyjnie strumień wody</li>
						<li>mosty przemysłowe (suwnice, mosty przeładunkowe)</li>
						<li>kładki piesze – dla ruchu pieszego (szczególnym przypadkiem kładek są żywe mosty)</li>
						Ze względu na charakter ustroju nośnego:

						<li>stałe</li>
						<li>ruchome (obrotowe, przesuwne, podnoszone, klapowe)</li>
						Ze względu na rodzaj materiału:

						<li>drewniane</li>
						<li>masywne (kamienne, ceglane, betonowe, żelbetowe, sprężone)</li>
						<li>metalowe (żelazne, stalowe, żeliwne)</li>
						<li>kompozytowe</li>
						Można spotkać rozwiązania, w których podpory wykonane są z innego tworzywa niż przęsła, np. stalowe przęsła na filarach z cegły (most stalowo-ceglany).<br>
						Z uwagi na liczbę przęseł można wyróżnić mosty jedno-, dwu-, lub wieloprzęsłowe.<br>
						W zależności od konstrukcji pomostu wyróżnia się mosty płytowe, belkowe, skrzynkowe, a także sklepione, łukowe i kratowe.<br>
						<img src="img/most3.jpg" style="float:right" width="300" height="200">
						Z uwagi na sposób podparcia przęsła mosty dzielone są na: wolnopodparte, wspornikowe, łukowe, wantowe i wiszące, o przęsłach stałych lub ruchowych (mosty zwodzone, obrotowe, uchylne i przetaczane).<br>
						Most podwieszony (most wantowy) – to most o płycie przęsła zawieszonej na cięgnach mocowanych na wieżach zwanymi również pylonami. 
						Przykładem takiego mostu jest największy i najdłuższy most w Polsce – Most Solidarności w Płocku przez Wisłę o rekordowej rozpiętości najdłuższego przęsła – 375 metrów, 
						będącego najdłuższym przęsłem w Polsce i tej części Europy. Długość mostu głównego (podwieszonego) wynosi 615 metrów, natomiast długość całkowita mostu to 1712 metrów.
						<img src="img/most4.jpg" style="float:left" width="300" height="200">
						</ul>
						
					</p>
			</div>
    </div>
<?php
	$nr_indeksu = '164459';
	$nrGrupy = '1';
	
	echo 'Autor: Miłosz Budzichowski '.$nr_indeksu.' grupa '.nrGrupy.'<br/><br/>';
?>
</body>
</html>
