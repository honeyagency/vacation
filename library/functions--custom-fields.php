<?php

function prepareHeaderFields()
{
    $imageID = get_field('field_58a778bf305af');
    if ($imageID != null) {
        $image = new TimberImage($imageID);
    } else {
        $image = null;
    }
    $section = array(
        'image' => $image,
    );
    return $section;
}
function prepareHomePageFields()
{
    $email = array(
        'title'       => get_field('field_58a785bf9d01f'),
        'description' => get_field('field_58a785d29d020'),
    );

    if (have_rows('field_58e8016eb545a')) {
        $food = array();
        while (have_rows('field_58e8016eb545a')) {
            the_row();
            $food[] = array(
                'item'        => get_sub_field('field_58e801f2b545b'),
                'description' => get_sub_field('field_58e801fcb545c'),
            );
        }
    } else {
        $food = null;
    }
    if (have_rows('field_58e8022caa428')) {
        $cocktails = array();
        while (have_rows('field_58e8022caa428')) {
            the_row();
            $cocktails[] = array(
                'item'        => get_sub_field('field_58e8022daa429'),
                'description' => get_sub_field('field_58e8022daa42a'),
            );
        }
    } else {
        $cocktails = null;
    }
    $menu = array(
        'food'      => $food,
        'cocktails' => $cocktails,
    );
    $section = array(
        'email' => $email,
        'menu'  => $menu,
    );
    return $section;
}

function prepareOptionsPage()
{
    $imageID = get_field('field_58e80d8f357a7', 'options');
    if (!empty($imageID)) {
        $image = new TimberImage($imageID);
    } else {
        $image = null;
    }
    $section = array(
        'image' => $image,
    );
    return $section;
}
