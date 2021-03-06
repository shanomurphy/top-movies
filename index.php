<?php include('functions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Top Rated Movies</title>
	<meta name="description" content="View top rated movies and filter by genre, person and year.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	*,*:before,*:after{box-sizing:border-box}html,button,input,select,textarea{font-family:helvetica, arial, sans-serif}html{font-size:100%;color:#111}@media (min-width: 40em){html{font-size:120%}}body{font-size:1em;line-height:1.5;margin:0}h1,h2,h3,h4,h5,h6,hgroup,ul,ol,dl,menu,p,figure,pre,table,fieldset,hr,blockquote,.vr{margin:0 0 2rem 0}img{vertical-align:middle;max-width:100%;height:auto;width:auto}ul,ol{padding:0;margin-left:2rem}select,input{padding:.6em 1em;border:solid 1px #777;border-radius:2px;color:#999;background:#FFF;box-shadow:0 1px 3px rgba(0,0,0,0.1) inset;transition:border 0.3s linear;line-height:1.5;font-size:1em}input:focus,button:focus{border-color:#4BB8CB}a{color:blue;transition:all .2s ease-in-out}a:hover{color:lightblue}.screen-reader-only{border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.cf,.filter-list>li{*zoom:1}.cf:before,.cf:after,.filter-list>li:before,.filter-list>li:after{content:"";display:table}.cf:after,.filter-list>li:after{clear:both}.pad{padding:2rem}.btn{display:inline-block;background:#0085B2;border-radius:3px;color:white;border:none;padding:.6em 1em;text-transform:uppercase;text-decoration:none;text-align:center}.btn:hover{background:#00abe5;color:white}.page-hd{background:#B9090C;color:white;text-align:center;position:relative}.logo{font-size:1.75em;display:inline-block;margin:2rem 2rem 1rem}.logo>a{color:white;text-transform:uppercase;font-weight:bold;display:inline-block;text-decoration:none;letter-spacing:.1em;position:relative;text-shadow:0 1px #111, -1px 0 #111, -1px 2px #111, -2px 1px #111, -2px 3px #111, -3px 2px #111, -3px 4px #111, -4px 3px #111}.logo>a:hover{color:white}.filters-toggle+label{cursor:pointer;display:block;text-align:center;position:relative;color:white;padding-bottom:2rem;font-weight:lighter}.filters-toggle+label:before{content:'';width:0;width:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:5px solid white;position:absolute;top:1.75em;left:50%;margin-left:-5px;opacity:.5}.filters-toggle:focus+label{color:#FFBF00}.filters-toggle+label+.filters{overflow:hidden;max-height:0;transition-duration:0.3s;transition-timing-function:cubic-bezier(0, 1, 0.5, 1)}.filters-toggle:checked+label+.filters{transition-duration:0.3s;transition-timing-function:ease-in;max-height:1000px}.filters{background:grey;color:white;font-size:.875em}.filter-fields{border:none;margin:0;padding:0}.filter-list{list-style:none;margin:0;text-align:left}.filter-list>li{margin-bottom:1rem}.filter-list>li:last-child{margin-bottom:0}@media (min-width: 58em){.filter-list{display:table;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;width:100%;max-width:62em;margin:0 auto}.filter-list>li{display:table-cell;display:-webkit-flex;display:-ms-flexbox;display:flex;padding-left:1rem;margin-bottom:0}.filter-list .btn{padding:.6em 1em}}.filter-list__label,.filter-list__input{float:left}.filter-list__label{display:inline-block;width:4em;padding:.6em 0}@media (min-width: 58em){.filter-list__label{width:auto;padding-right:1rem}}.filter-list__input{width:calc(100% - 4em)}@media (min-width: 58em){.filter-list__person{max-width:20em}}@media (min-width: 58em){.filter-list__year{max-width:8em}}.styled-select{overflow:hidden;background:#fff url("data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNDUgNDUiPjxzdHlsZT4uc3Qwe2ZpbGwtcnVsZTpldmVub2RkO2NsaXAtcnVsZTpldmVub2RkO2ZpbGw6IzAwODNCODt9IC5zdDF7ZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7ZmlsbDojRkZGRkZGO308L3N0eWxlPjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0wIDBoNDV2NDVIMHoiLz48cGF0aCBjbGFzcz0ic3QxIiBkPSJNMTggMjFoMTBsLTUgNXoiLz48L3N2Zz4=") no-repeat right 50%;background-size:contain;border:solid 1px #777;border-radius:2px;min-height:2.4rem;position:relative;min-width:12em}.styled-select select{padding:.6em 1em;width:130%;border:none;box-shadow:none;background:transparent;background-image:none;-webkit-appearance:none}.search-btn{padding:1em 2em;width:100%}.lazy-loaded .results-wrap{max-width:100%;text-align:center}.results-desc{padding:1em;background:#EEE;text-align:center;color:#777;font-weight:lighter;margin-bottom:1rem}.results-desc__genre{text-transform:lowercase}.results-list{margin-left:0;list-style:none}.results-list>li{border-bottom:solid 1px #DDD}.results-list>li:last-child{border:0}.lazy-loaded .results-list{margin-left:-2rem}.lazy-loaded .results-list>li{display:inline-block;border-bottom:0;padding-left:2rem;margin-bottom:3rem}.results-item{font-size:1em;display:block;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-ms-flex-align:center;align-items:center;padding:1rem 0;text-decoration:none;color:#444}.results-item>span{padding-left:1rem}.results-item>span:first-child{padding-left:0}.results-item:hover{color:black;background:rgba(0,133,178,0.1)}.results-item:hover>.results-item__num{opacity:1;color:#FFBF00}@media (min-width: 40em){.results-item{padding:1rem}}.lazy-loaded .results-item{display:inline-block;position:relative;width:185px;background:grey}.lazy-loaded .results-item:before{padding-top:150%;display:block;content:''}.lazy-loaded .results-item>span{display:block;position:absolute}.lazy-loaded .results-item>.results-item__title{color:white;padding:1em;top:0;left:0;right:0;bottom:0;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-ms-flex-align:center;align-items:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.lazy-loaded .results-item>.results-item__rating{bottom:-1.5em;left:0;width:100%;padding:0}.lazy-loaded .results-item>.results-item__rating>.results-item__year{display:inline-block;font-weight:lighter;color:#999}.lazy-loaded .results-item>.results-item__num{top:1em;left:1em;width:2em;height:2em;line-height:2em;opacity:1;color:white;z-index:2;background:black;font-size:.75em;border-radius:50%}.results-item__poster{display:none}.lazy-loaded .results-item__poster{display:block;position:absolute;top:0;right:0;bottom:0;left:0;z-index:1;background-repeat:no-repeat;background-size:cover}.results-item__num{font-size:1.5em;font-weight:bold;opacity:.25;width:3em}.results-item__num:before{content:'#'}.results-item__title{width:100%}.results-item__rating{font-weight:bold;white-space:nowrap;color:#111;font-size:1.125em}.results-item__year{display:none}.show-images{text-align:center;margin-bottom:.25rem}.show-images>button{background:none;padding:.5em;color:#B9090C;border:none;font-size:.75em;cursor:pointer}.show-images>button:focus{outline:none;text-decoration:underline}.lazy-loaded .show-images{margin-bottom:.5rem}.icon-star:before{content:'\2605';color:#FFBF00}.pagi{list-style:none;margin:0 auto 2rem;background:#DDD;display:table;width:100%;max-width:30em;text-align:center}.pagi>li{display:table-cell;vertical-align:middle}.pagi>li>a{display:block;border-radius:0}.pagi>li:nth-child(2){padding:.6em 1em;color:#555;font-weight:lighter}.max-width{max-width:50em;margin:0 auto}.single{max-width:42em;margin:0 auto}.single__poster{width:25%;max-width:185px;float:left;margin:0 1rem .5rem 0;background:#DDD no-repeat;background-size:cover;position:relative}.single__poster:after{padding-top:150%;display:block;content:''}@media (min-width: 40em){.single__poster{margin-right:2rem}}.single__title{float:left;width:70%;width:calc(100% - 4em);font-size:1.25em}@media (min-width: 40em){.single__title{font-size:1.5em}}.single__rating{float:right;font-size:1.25em}.single__desc{font-size:.875em}.single__info{list-style:none;margin-left:0;float:left;font-size:.875em;font-family:monospace}.single__info>li{border-bottom:solid 1px #DDD;margin-bottom:.25em;padding-bottom:.25em}.single__info>li:last-child{border-bottom:0}.drop-cap:first-letter{font-weight:bold;float:left;font-size:3em;line-height:0.9;padding-top:4px;padding-right:8px}footer{text-align:center;font-size:.75em;color:#777}footer>img{margin-bottom:.5rem}
	</style>
	<link rel="apple-touch-icon" href="http://res.cloudinary.com/shanomurphy/image/upload/v1475320632/apple-touch-icon_duexon.png">
	<link rel="shortcut icon" href="http://res.cloudinary.com/shanomurphy/image/upload/v1475320632/favicon_orpbu2.ico">
</head>

<body>

	<main role="main">

		<div class="page-hd">

			<h1 class="logo">
				<a href="index.php">Top Rated Movies</a>
			</h1>

			<input class="filters-toggle screen-reader-only" id="toggle-filters" type="checkbox">

			<label for="toggle-filters">Filter Results</label>

			<div class="filters">

				<form class="pad" action="index.php" method="get">

					<fieldset class="filter-fields">

						<legend class="screen-reader-only">Filters</legend>

						<ol class="filter-list">

							<li>

								<label class="filter-list__label" for="with_genres">Genre</label>

								<div class="styled-select">
									<select class="filter-list__input" name="with_genres">
										<option value="">all</option>
										<?php foreach ($genres_foo as $key=>$val) : ?>
											<option value="<?php echo $val; ?>" <?php if( $genre == $val ) { echo 'selected'; } ?>><?php echo $key; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

							</li>

							<li>
								<label class="filter-list__label" for="search_name">Person</label>
								<input class="filter-list__input filter-list__person" type="search" name="search_name" value="<?php echo $search_name; ?>" placeholder="e.g tom hanks">
							</li>

							<li>
								<label  class="filter-list__label" for="search_name">Year</label>
								<input class="filter-list__input filter-list__year" type="number" name="search_year" value="<?php echo $year; ?>" placeholder="e.g. 1994">
							</li>

							<li>
								<input class="btn search-btn" type="submit" value="go">
							</li>

						</ol>

					</fieldset>

				</form>

			</div>

		</div>

		<div class="pad max-width results-wrap">

			<?php if( $get_movies['total_results'] != 0 ) : ?>

				<p class="results-desc">
					<?php if( $get_person['total_results'] != 0 || !empty($genre_name) || !empty($year) ) : ?>
						Showing highest rated <strong><?php echo $person_name; ?> <span class="results-desc__genre"><?php echo $genre_name; ?></span></strong> movies <strong><?php if(!empty($year)) { echo 'from '.$year.''; } ?></strong>
					<?php elseif( !empty($search_name) ) : ?>
						Sorry we couldn't find that person
					<?php else : ?>
						Showing all top rated movies
					<?php endif; ?>
				</p>

				<p class="show-images"><button class="show-images" id="js-view-images">show images</button></p>

				<ol class="results-list" <?php if( $page > 1 ) { echo 'start="'.($page*10).'"'; } ?>>
					<?php
					$results_counter = ($page-1)*20;
					foreach ($get_movies['results'] as $a) :
						$results_counter++;
					?>
						<li>
							<?php
								$movie_year = substr($a['release_date'],0,4);
							?>
							<a class="results-item" href="<?php echo ''.$url.'&movie_id='.$a['id'].''; ?>" title="<?php echo $a['title']; ?>">
								<span class="results-item__num"><?php echo $results_counter; ?></span>
								<span class="results-item__title"><?php echo ''.$a['title'].' ('.$movie_year.')'; ?></span>
								<span class="results-item__rating"><span class="icon-star"></span><span class="screen-reader-only">Rating:</span> <?php echo $a['vote_average']; ?> <span class="results-item__year">(<?php echo $movie_year; ?>)</span></span>
								<div class="results-item__poster js-lazy-load" data-src="http://image.tmdb.org/t/p/w185/<?php echo $a['poster_path']; ?>"></div>
							</a>
						</li>
					<?php endforeach; ?>
				</ol>

				<ul class="pagi cf">
					<li>
						<?php if( $page > 1 ) : ?>
							<a class="btn" href="<?php echo $prev; ?>">prev</a>
						<?php endif; ?>
					</li>
					<li>Page: <?php echo $page; ?></li>
					<li>
						<?php if( $page < $get_movies['total_pages'] ) : ?>
							<a class="btn" href="<?php echo $next; ?>">next</a>
						<?php endif; ?>
					</li>
				</ul>

			<?php elseif( !empty($movie_id) ) : ?>

				<div class="single cf">

					<div class="cf">

						<h2 class="single__title"><?php echo $get_movies['title'].' <small>('.substr($get_movies['release_date'],0,4).')</small>'; ?></h2>

						<p class="single__rating"><span class="icon-star"></span><span class="screen-reader-only">Rating:</span> <?php echo $get_movies['vote_average']; ?></p>

					</div>

					<div class="cf">

						<div class="single__poster" id="js-lazy-load" data-src="http://image.tmdb.org/t/p/w185/<?php echo $get_movies['poster_path']; ?>"></div>

						<p class="single__desc drop-cap"><?php echo $get_movies['overview']; ?></p>

						<ul class="single__info">
							<li>
								<strong>Genre:</strong>
								<?php
								$i = 0;
								foreach ($get_movies['genres'] as $genre) {
									$i++;
									if( $i != 1 ) { echo ', '; }
									echo $genre['name'];
								}
								?>
							</li>
							<li><strong>Release Date:</strong> <?php echo $get_movies['release_date']; ?></li>
							<li><strong>Runtime:</strong> <?php echo $get_movies['runtime']; ?>min</li>
							<li><strong>Tagline:</strong> <?php echo $get_movies['tagline']; ?></li>
						</ul>

					</div>

					<p>
						<a class="btn" href="<?php echo preg_replace('/&movie_id=[0-9]+/', '', $url); ?>">Back</a>
					</p>

				</div>

			<?php else : ?>

				<p class="results-desc">
					Sorry no movies found matching those filters.<br>
					Edit your filters and search again or <a href="index.php">view all top rated movies</a>
				</p>

			<?php endif; ?>

		</div>

	</main>

	<footer class="max-width" role="contentinfo">
		<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAA3CAMAAAB5LOkwAAABQVBMVEX///8s24zs/PVI4JvD9d5s5q8V2H8A1HSR7MOH674g2YX7/v1h5Kkw3I5e5Kfm+/H0/fkq24sL13o33ZL2/voE1XZv57Hh+u8K1nkP13wu3I0G1XfJ9uIC1HVM4Z3T+OcS134Z2ILW+Oko24oi2ocI1Xjx/fe99NvF9d9U4qLj+vCJ67/v/PbQ9+WG67146LUX2IFE35mU7cUk2og63pSN7MGf78tQ4aB66bfL9uPo+/Pl+/Fy57LN9+QQ131L4Z3t/PUb2YMU139A35e389k43ZOd7sqh78zp+/P5/vyQ7MPb+etY46Ta+evH9uDz/fhD35li5amz8tZk5atF4Jpj5ao03ZAY2IGv8tOm8M453pPX+el26LQ83pVq569o5q0z3ZBn5ay289db46Z96bhT4qHB9d2X7cZP4Z+b7shc5KYslo50AAACM0lEQVR4AZXU5WKjQABF4dvQ5NaFQtzdU3dvt+667v7+D7ADkfWZ4fvNGQXg2k+aVDKT++gqGxFqiRhluBZtarMXIcQT9CARB2BQGArWBhVqwSEKBlAySVbq0FCvkDRLWCI5Z0GLNUdyCRGSy9C0TDICCrPQNEvBTQagaeDvZHh8bdxR9WEbXdvS5HxnN+BIG7g+6z72XJqk2JHDGA/gWEn0SZPV9aB/k9H11wu4ZSwOoD7HJ9LEkecbCCNkvg5sUZ1MDHGsk3AJTZJT+olt218L3pLcPcmtOy9J3trj42rFS5JBaOcGM56SIsahmYz0EkFnLwGeQRjjtJvs8a0qsa5yLQjvYkNuYsReqRLgGI6jbAiOtWxVkXj+Xi4/GMnkp48XcHzZMwR/Q574CnSNWABu6Qp/licBpkfzJJMA/LRzo0PkgyoJ4vK9iL45ye42ijMMh5QJkDX54CTTAK7ViR/CdxZCIgn7WyMFTkEnqZFxkbgSZa1kmUyJJLEZCJN+rSTKxwmRpLPj51dkVpG0AKyT993tN8mSIpk5bM6T5qmTmCeLgwGG16RJmi7zBk7S1oI02SVp74y9QC8JvFT8xlMbjUbKB1foYmNjZWUc8kTFe4JZ78kgyYK3ZJ7kvKekSTJ2+HtSLfX/V/lphcKo9VvSyFDpGX5NUhpFEO3kBI54hCrpGvDLLEdGbtQV7ftVtG+yY3RroYpOEl2FcGzh34Y70EVOn8Ibxvrh0eYBvFqAVz8A2DtRCbbjf8MAAAAASUVORK5CYII=" alt="">
		<p>This product uses the <a href="https://www.themoviedb.org">TMDb</a> API but is not endorsed or certified by TMDb.</p>
	</footer>

	<?php
	// If single movie
	if( !empty($movie_id) ) :
	?>

		<script>

		// Lazy load single poster img
		function load_single_img() {
			var poster_element = document.getElementById('js-lazy-load');
			var img_url = poster_element.getAttribute('data-src');
			poster_element.style.backgroundImage = 'url('+img_url+')';
		}

		window.onload = load_single_img;

		</script>

	<?php else : ?>

		<script>
			function load_images(){for(var e=document.getElementsByClassName("js-lazy-load"),t=0;t<e.length;t++)if(e[t].getAttribute("data-src")){var o=e[t].getAttribute("data-src");e[t].style.backgroundImage="url("+o+")"}"x hide images"==button.innerHTML?(root.classList.remove("lazy-loaded"),button.innerHTML="show images",localStorage.removeItem("show_images")):(button.innerHTML="x hide images",root.className+=" lazy-loaded",localStorage.setItem("show_images","yes"))}function storage_check(){"yes"==localStorage.show_images&&load_images()}var button=document.getElementById("js-view-images"),root=document.documentElement;button.onclick=load_images,window.onload=storage_check;

		</script>

	<?php endif; ?>

</body>

</html>