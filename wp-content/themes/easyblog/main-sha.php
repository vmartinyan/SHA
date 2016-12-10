<!--?php  /* Template Name: main-sha */ ?-->

<!--Выводим шапку-->
<?php get_header(); ?>

<!--Индивидуальные стили шаблона. У Вас они скорее всего отличаются-->
<div id="content">
<div id="postarea">
<div class="homepage_post">
<div class="homepage_in">
<div class="post">

<!--Заголовок страницы-->
<h2>Здесь должен быть заголовок</h2>

<!--Какой-то текст-->
<p>Здесь может быть текст, но это не обязательно</p>

<!--Код вывода миниатюр на главной-->
<div class="katalog">
<ul><?php query_posts('showposts=20'); ?> <!--Цифра 20 - количество миниатюр-->
<?php while (have_posts()) : the_post(); ?>
<li>
<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
</li>
<?php endwhile; ?>
</ul>
</div>
<!--Конец кода вывода миниатюр-->

</div>
</div>
</div>
</div>

<!--Код вывода сайдбара-->
<?php get_sidebar(); ?>
</div>
<!--Конец индивидуальных стилей-->

<!--Код вывода подвала-->
<?php get_footer(); ?>