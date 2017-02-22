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
    $section = array(
        'email' => $email,
    );
    return $section;
}
