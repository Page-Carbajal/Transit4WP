<?php
$data = Timber::get_context();
$data['posts'] = Timber::get_posts();
$data['var'] = 123;
Timber::render( 'single.twig', $data );