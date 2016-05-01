<?php
$admin_level = "0";

print "<script>
		$('.dashboard').removeClass('hidden');
	 </script>";

if ($admin_level == "00") {
	print "<script>
		$('.postPage').removeClass('hidden');
		$('.adminsPage').removeClass('hidden');
		$('.postCategoryPage').removeClass('hidden');
		$('.storiesTitlePage').removeClass('hidden');
		$('.storiesPage').removeClass('hidden');
		$('.storiesPage').removeClass('hidden');
		$('.storiesTitlePage').removeClass('hidden');
		$('.quotesPage').removeClass('hidden');
		$('.quoteAuthorsPage').removeClass('hidden');
		$('.subscribersPage').removeClass('hidden');
		 </script>";

}
elseif ($admin_level == "0") {//super admin
	print "<script>
		$('.postPage').removeClass('hidden');
		$('.adminsPage').removeClass('hidden');
		$('.postCategoryPage').removeClass('hidden');
		$('.storiesTitlePage').removeClass('hidden');
		$('.storiesPage').removeClass('hidden');
		$('.storiesPage').removeClass('hidden');
		$('.storiesTitlePage').removeClass('hidden');
		$('.quotesPage').removeClass('hidden');
		$('.quoteAuthorsPage').removeClass('hidden');

		setTimeout(function() {
			$('.adminTable').find('.dbtn').addClass('disabled'); }, 4000);

	 </script>";
} 
elseif($admin_level == 1) {//////Blogger
	 print "<script>
		$('.postPage').removeClass('hidden');
		$('.postCategoryPage').removeClass('hidden');
		
	 </script>";
		
} elseif ($admin_level == 2) {//////story teller

	print "<script>
		$('.storiesPage').removeClass('hidden');
		$('.storiesTitlePage').removeClass('hidden');
		</script>";
	
}
