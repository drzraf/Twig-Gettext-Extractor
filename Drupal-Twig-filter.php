<?php

function twig_no_op($string) { return $string; }
$twig->addFunction(new \Twig_SimpleFunction('render_var', 'twig_no_op'));
$twig->addFunction(new \Twig_SimpleFunction('url', 'twig_no_op'));
$twig->addFunction(new \Twig_SimpleFunction('path', 'twig_no_op'));
$twig->addFunction(new \Twig_SimpleFunction('link', 'twig_no_op'));
$twig->addFunction(new \Twig_SimpleFunction('file_url', 'twig_no_op'));
$twig->addFunction(new \Twig_SimpleFunction('attach_library', 'twig_no_op'));
$twig->addFunction(new \Twig_SimpleFunction('active_theme_path', 'twig_no_op'));
$twig->addFunction(new \Twig_SimpleFunction('active_theme', 'twig_no_op'));
$twig->addFunction(new \Twig_SimpleFunction('abbr', 'twig_no_op'));
$twig->addFunction(new \Twig_SimpleFunction('idelink', 'twig_no_op'));
$twig->addFunction(new \Twig_SimpleFunction('kint', 'twig_no_op'));

$twig->addFilter(new \Twig_SimpleFilter('t', 't', array('is_safe' => array('html'))));
$twig->addFilter(new \Twig_SimpleFilter('trans', 't', array('is_safe' => array('html'))));
$twig->addFilter(new \Twig_SimpleFilter('placeholder', 'twig_no_op', array('is_safe' => array('html'), 'needs_environment' => TRUE)));
$twig->addFilter(new \Twig_SimpleFilter('drupal_escape', 'twig_no_op', array('needs_environment' => TRUE, 'is_safe_callback' => 'twig_escape_filter_is_safe')));
$twig->addFilter(new \Twig_SimpleFilter('safe_join', 'twig_no_op', ['needs_environment' => TRUE, 'is_safe' => ['html']]));
$twig->addFilter(new \Twig_SimpleFilter('without', 'twig_without'));
$twig->addFilter(new \Twig_SimpleFilter('clean_class', 'twig_no_op'));
$twig->addFilter(new \Twig_SimpleFilter('clean_id', 'twig_no_op'));
$twig->addFilter(new \Twig_SimpleFilter('render', 'twig_no_op'));
$twig->addFilter(new \Twig_SimpleFilter('format_date', 'twig_no_op'));
