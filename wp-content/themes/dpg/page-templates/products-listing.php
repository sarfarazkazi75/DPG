<?php
/* Template Name: Product Listing */

get_header();
?>

<section class="inner-page-banner-section">
	<div class="banner-image">
		<img src="<?php echo site_url(); ?>/wp-content/uploads/2022/10/soft-wiring-banner.jpg" alt="">
	</div>
	<div class="inner-banner-content text-center d-flex justify-content-center align-items-center">
		<div class="container">
			<h1> Soft Wiring & Accessories</h1>
		</div>
	</div>
</section>

<section class="products-list py-80">
	<div class="container">
		<div class="product-info">
			<ul class="breadcrumb">
				<li><a href="#">Home</a> &nbsp;/&nbsp;&nbsp; </li>
				<li><a href="#">Products</a> &nbsp;/&nbsp;&nbsp; </li>
				<li>Soft wiring & accessories (previously “power modules & accessories”)</li>
			</ul>
			<div class="content-bloc">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquet ex sem, nec pulvinar ligula egestas id. Pellentesque non tellus sit amet velit luctus ornare nec ut justo. Duis non porta dolor. Cras fringilla risus sed felis auctor, dapibus finibus lorem pulvinar. Aenean molestie mauris sit amet tellus sodales semper. In at finibus purus. Proin sollicitudin, nibh vel condimentum volutpat, tellus mauris consequat dui, in luctus nibh tellus id mi. Donec eget facilisis purus. Quisque in mauris massa. Integer posuere pellentesque dui sit amet bibendum. Fusce at nisl aliquet, pulvinar felis ut, tincidunt mi. Nullam arcu lacus, mattis sit amet mi eget, imperdiet aliquet ex. Phasellus rhoncus augue non lacus fringilla mattis nec vel magna. Sed pretium, mi vitae tristique dapibus, urna urna imperdiet mi, sed gravida tellus nunc a erat. Aenean pulvinar ipsum non interdum laoreet.</p>
				<p>Etiam pellentesque suscipit gravida. Maecenas porta ultrices ligula, vitae hendrerit ipsum lobortis a. Aliquam bibendum, odio et molestie egestas, enim turpis mollis libero, vel ullamcorper augue eros eu dolor. Duis a leo nec quam mollis pellentesque vel sit amet nisl. Nulla suscipit, diam eu rutrum viverra, mauris ante aliquet tortor, dictum auctor libero magna et augue. Etiam id ipsum lacus. Nullam a laoreet.</p>
			</div>
		</div>
		<div class="product-filter d-flex justify-content-end">
			<select class="filter" name="filter">
				<option value="a-z">Alphabate A-Z</option>
				<option value="z-a">Alphabate Z-A</option>
			</select>
		</div>
		<div class="products-wrapper d-flex flex-wrap">
			<div class="product-item">
				<a href="#" class="product-block">
					<div class="image-block">
						<div class="image">
							<img src="https://dddemo.net/wordpress/2022/DPG/wp-content/uploads/2022/10/Rectangle-23-2.jpg" alt="">
						</div>
					</div>
					<div class="product-name-block">
						<h6>In Desk Modules</h6>
					</div>
				</a>
			</div>
			<div class="product-item">
				<a href="#" class="product-block">
					<div class="image-block">
						<div class="image">
							<img src="https://dddemo.net/wordpress/2022/DPG/wp-content/uploads/2022/10/Rectangle-23-1.jpg" alt="">
						</div>
					</div>
					<div class="product-name-block">
						<h6>In Desk Modules</h6>
					</div>
				</a>
			</div>
			<div class="product-item">
				<a href="#" class="product-block">
					<div class="image-block">
						<div class="image">
							<img src="https://dddemo.net/wordpress/2022/DPG/wp-content/uploads/2022/10/Rectangle-23-2.jpg" alt="">
						</div>
					</div>
					<div class="product-name-block">
						<h6>On Desk Modules</h6>
					</div>
				</a>
			</div>
			<div class="product-item">
				<a href="#" class="product-block">
					<div class="image-block">
						<div class="image">
							<img src="https://dddemo.net/wordpress/2022/DPG/wp-content/uploads/2022/10/Rectangle-23-1.jpg" alt="">
						</div>
					</div>
					<div class="product-name-block">
						<h6>Cable Management</h6>
					</div>
				</a>
			</div>
			<div class="product-item">
				<a href="#" class="product-block">
					<div class="image-block">
						<div class="image">
							<img src="https://dddemo.net/wordpress/2022/DPG/wp-content/uploads/2022/10/Rectangle-23-2.jpg" alt="">
						</div>
					</div>
					<div class="product-name-block">
						<h6>Monitor Arms</h6>
					</div>
				</a>
			</div>
			<div class="product-item">
				<a href="#" class="product-block">
					<div class="image-block">
						<div class="image">
							<img src="https://dddemo.net/wordpress/2022/DPG/wp-content/uploads/2022/10/Rectangle-23-1.jpg" alt="">
						</div>
					</div>
					<div class="product-name-block">
						<h6>CPU Supports</h6>
					</div>
				</a>
			</div>
			<div class="product-item">
				<a href="#" class="product-block">
					<div class="image-block">
						<div class="image">
							<img src="https://dddemo.net/wordpress/2022/DPG/wp-content/uploads/2022/10/Rectangle-23-2.jpg" alt="">
						</div>
					</div>
					<div class="product-name-block">
						<h6>Floor Boxes</h6>
					</div>
				</a>
			</div>
			<div class="product-item">
				<a href="#" class="product-block">
					<div class="image-block">
						<div class="image">
							<img src="https://dddemo.net/wordpress/2022/DPG/wp-content/uploads/2022/10/Rectangle-23-1.jpg" alt="">
						</div>
					</div>
					<div class="product-name-block">
						<h6>Infrastructure Electrical</h6>
					</div>
				</a>
			</div>
		</div>
		<div class="load-more pt-70 text-center">
			<button type="button" class="btn">Load more</button>
		</div>
	</div>
</section>

<?php
get_footer();