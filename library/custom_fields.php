<?php
function prepareHomepageFields()
{
    if (have_rows('field_58b755bce05c6')) {
        while (have_rows('field_58b755bce05c6')) {
            the_row();
            $words[] = get_sub_field('field_58b755dae05c7');
        }
    }
    $section = array(
        'words'        => $words,
        'title'        => get_field('field_56ccad2c4ad75'),
        'subtitle'     => get_field('field_56ccad48600c1'),
        'contacttitle' => get_field('field_56ce16aea17fa'),
        'contactform'  => get_field('field_58af348870900'));

    return $section;
}
function prepareSocialFields()
{
    $section = array(
        'linkedin' => get_field('field_56ce02c41bf14'),
        'phone'    => get_field('field_56ce03f21bf17'),
        'mail'     => get_field('field_56ce04201bf18'),
    );
    return $section;
}
