<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package guardexpert
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="max-w-[1200px] mx-auto mb-10 lg:mb-[120px] px-[10px]">
			<img src="<?php echo get_template_directory_uri(); ?>/img/404.png" alt="404" class='w-full mx-auto py-9'/>
			<div class="flex flex-col items-center justify-center max-w-[670px] mx-auto">
				<h4 class="text-black text-[22px] font-semibold font-['Geologica'] mb-5">Страница не найдена</h4>
				<p class="text-base text-black text-normal text-center mb-5">К сожалению, запрашиваемая страница недоступна.</br>
Возможно, страница была удалена, ссылка устарела или адрес указан с ошибкой.</p>
				<a href="/" class="w-full h-[50px] max-w-[385px] text-[15px] text-white font-normal flex justify-center items-center bg-[#B3262E] rounded-[2px] shadow-md hover:shadow-lg hover:text-[#b3262E] hover:bg-transparent hover:border hover:border-[#B3262E] transition">Вернуться на главную</a>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
