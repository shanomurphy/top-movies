<?php include('functions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Top Rated Movies</title>
	<meta name="description" content="View top rated movies and filter by genre, person and year.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		<?php include('style.min.css'); ?>
	</style>
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

		<div class="pad max-width">

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

				<ol class="results-list" <?php if( $page > 1 ) { echo 'start="'.($page*10).'"'; } ?>>
					<?php
					$results_counter = 0;
					if( $page > 1 ) {
						$results_counter = $page*10;
					}
					foreach ($get_movies['results'] as $a) :
						$results_counter++;
					?>
						<li>
							<?php
								$movie_year = substr($a['release_date'],0,4);
							?>
							<a class="results-item" href="<?php echo ''.$url.'&movie_id='.$a['id'].''; ?>">
								<span class="results-item__num"><?php echo $results_counter; ?>.</span>
								<span class="results-item__title"><?php echo ''.$a['title'].' ('.$movie_year.')'; ?></span>
								<span class="results-item__rating"><span class="icon-star"></span><span class="screen-reader-only">Rating:</span> <?php echo $a['vote_average']; ?></span>
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

						<div class="single__poster js-lazy-load" data-src="http://image.tmdb.org/t/p/w185/<?php echo $get_movies['poster_path']; ?>"></div>

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

	<?php if( !empty($movie_id) ) : ?>

		<script>

		// Lazy load images
		function load_images() {

			var img_defer = document.getElementsByClassName('js-lazy-load');

			for (var i=0; i<img_defer.length; i++) {
				if(img_defer[i].getAttribute('data-src')) {
					img_defer[i].setAttribute('src',img_defer[i].getAttribute('data-src'));
					var img_url = img_defer[i].getAttribute('data-src');
					img_defer[i].style.backgroundImage = 'url('+img_url+')';
				}
			}

		}

		window.onload = load_images;

		</script>

	<?php endif; ?>

</body>

</html>