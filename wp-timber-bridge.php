<?php
// (c) 2018 Raphaël Droz <raphael.droz+floss@gmail.com>
// Bridge between Twig-Gettext-Extractor and WordPress/Timber:
// find templates/ -type f -name '*twig' | TIMBER_DIR=/path/to/wp/plugins/timber-library twig-gettext-extractor --require wp-timber-bridge.php --files stdin -- -o -

function add_action() { }
include_once(getenv('TIMBER_DIR') . '/lib/Twig_Function.php');
include_once(getenv('TIMBER_DIR') . '/lib/Twig.php');
$x = new \Timber\Twig();
$x->add_timber_functions($twig);

foreach(['__','_e','_n','_x','_ex','_nx','esc_attr__','esc_attr_e','esc_attr_x','esc_html__','esc_html_e','esc_html_x','_n_noop','_nx_noop','translate_nooped_plural'] as $a) {
    $extractor->addGettextParameter('-k' . $a);
}
$extractor->addGettextParameter('-L');
$extractor->addGettextParameter('PHP');
